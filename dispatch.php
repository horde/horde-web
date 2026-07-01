<?php
/**
 * Main dispatch page - PSR-7 version
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 *
 * hordeweb is dispatched two ways:
 *
 *   1. Standalone: this file is the entry point. The webroot prefix is
 *      derived from config/conf.php's $host_base (path component), and
 *      $fs_base points at hordeweb's filesystem root. There is no Horde
 *      registry entry for hordeweb because the site is not embedded in
 *      a larger Horde install.
 *
 *   2. Registered as a Horde app under horde/rampage.php. Horde\Core's
 *      RuntimeRoutesProvider walks the registry, finds hordeweb's
 *      registry.d snippet, and loads config/routes.php inside a group
 *      whose prefix is the registered webroot and whose defaults set
 *      ['app' => 'hordeweb']. This dispatcher is not invoked in that
 *      mode; rampage matches, resolves the controller from the injector,
 *      and runs the middleware stack itself.
 *
 * config/routes.php is app-relative: it must define routes without any
 * webroot prefix. Both dispatchers wrap the include in a Horde\Routes
 * GroupMapper group that supplies the correct prefix and app default,
 * so the same routes file works verbatim under both entry points.
 */

declare(strict_types=1);

use Horde\Http\RequestFactory;
use Horde\Http\ResponseFactory;
use Horde\Http\StreamFactory;
use Horde\Http\UriFactory;
use Horde\Http\Server\RequestBuilder;
use Horde\Http\Server\ResponseWriterWeb;
use Horde\Routes\GroupMapper;
use Horde\Routes\Utils;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Server\RequestHandlerInterface;

// Load Composer autoloader if not already loaded
if (!class_exists('Composer\Autoload\ClassLoader', false)) {
    $localAutoloader = dirname(__FILE__) . '/vendor/autoload.php';
    $dependencyAutoloader = dirname(__FILE__) . '/../../autoload.php';

    if (file_exists($localAutoloader)) {
        require_once $localAutoloader;
    } elseif (file_exists($dependencyAutoloader)) {
        require_once $dependencyAutoloader;
    }
}

// Initialize Horde framework (loads config, sets up injector).
// After this returns, $host_base and $fs_base from config/conf.php
// are available as globals.
require_once dirname(__FILE__) . '/app/lib/base.php';

// Create PSR-17 factories and register in injector for reuse
$requestFactory = new RequestFactory();
$streamFactory = new StreamFactory();
$uriFactory = new UriFactory();
$responseFactory = new ResponseFactory();

$injector->setInstance(RequestFactory::class, $requestFactory);
$injector->setInstance(StreamFactoryInterface::class, $streamFactory);
$injector->setInstance(UriFactory::class, $uriFactory);
$injector->setInstance(ResponseFactoryInterface::class, $responseFactory);

// Build PSR-7 request from global variables
$requestBuilder = new RequestBuilder($requestFactory, $streamFactory, $uriFactory);
$psr7Request = $requestBuilder->withGlobalVariables()->build();

// Derive the webroot prefix from config/conf.php's $host_base. In
// standalone mode there is no registry entry to consult; $host_base
// carries both the scheme+host and the path prefix ('/hordeweb', or
// '' when hordeweb is mounted at the document root).
$webrootPrefix = rtrim((string) parse_url($host_base ?? '', PHP_URL_PATH), '/');

// Create modern GroupMapper and load routes under a group whose prefix
// matches the deployed webroot and whose defaults set the app. This
// mirrors what horde/Core's RuntimeRoutesProvider does for registered
// apps, so config/routes.php can stay app-relative.
$mapper = new GroupMapper();
$injector->setInstance(GroupMapper::class, $mapper);

$mapper->group(
    [
        'prefix' => $webrootPrefix,
        'defaults' => ['app' => 'hordeweb'],
    ],
    function (GroupMapper $mapper) {
        require dirname(__FILE__) . '/config/routes.php';
    },
);
$mapper->compile();

// Create Utils for URL generation (replaces legacy Horde_Controller_UrlWriter)
$utils = new Utils($mapper);
$injector->setInstance(Utils::class, $utils);

// Match the incoming path directly against the GroupMapper. Matcher
// (the PSR-7-aware wrapper) is Mapper-typed and would not accept a
// GroupMapper; routematch() is the canonical entry point on both and
// is what rampage uses as well.
$path = $psr7Request->getUri()->getPath();
$result = $mapper->routematch($path);

if ($result === null) {
    $psr7Response = $responseFactory->createResponse(404, 'Not Found')
        ->withBody($streamFactory->createStream(
            '<h1>404 Not Found</h1><p>No route matched: '
            . htmlspecialchars($path, ENT_QUOTES, 'UTF-8')
            . '</p>',
        ));
    (new ResponseWriterWeb())->writeResponse($psr7Response);
    return;
}

[$match, $route] = $result;

// Determine controller from route. hordeweb's routes define FQCN
// controllers via ->withController(Home::class); the legacy short-name
// fallback is kept so any pre-modern route still resolves.
$controllerClass = $match['controller'] ?? 'home';
if (!class_exists($controllerClass)) {
    $controllerClass = 'Horde\\Hordeweb\\Controller\\' . ucfirst($controllerClass);
}

if (!class_exists($controllerClass)) {
    $psr7Response = $responseFactory->createResponse(404, 'Not Found')
        ->withBody($streamFactory->createStream(
            '<h1>404 Not Found</h1><p>Controller not found.</p>',
        ));
} else {
    $controller = new $controllerClass($injector, $responseFactory, $streamFactory);

    if (!$controller instanceof RequestHandlerInterface) {
        throw new \RuntimeException(
            "Controller {$controllerClass} must implement RequestHandlerInterface",
        );
    }

    $psr7Request = $psr7Request->withAttribute('route', $match);
    $psr7Response = $controller->handle($psr7Request);
}

// Output response
(new ResponseWriterWeb())->writeResponse($psr7Response);

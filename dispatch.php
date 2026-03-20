<?php
/**
 * Main dispatch page - PSR-7 version
 *
 * Copyright 2011-2026 Horde LLC (http://www.horde.org)
 */

declare(strict_types=1);

use Horde\Http\RequestFactory;
use Horde\Http\ResponseFactory;
use Horde\Http\StreamFactory;
use Horde\Http\UriFactory;
use Horde\Http\Server\RequestBuilder;
use Horde\Http\Server\ResponseWriterWeb;
use Horde\Routes\Matcher;
use Horde\Routes\Mapper;
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

// Initialize Horde framework (loads config, sets up injector)
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

// Create modern Mapper and load routes
$mapper = new Mapper();
$injector->setInstance(Mapper::class, $mapper);

// Load routes into mapper
$registry = $injector->getInstance('Horde_Registry');
require dirname(__FILE__) . '/config/routes.php';

// Create Utils for URL generation (replaces legacy Horde_Controller_UrlWriter)
$utils = new Utils($mapper);
$injector->setInstance(Utils::class, $utils);

// Match route using PSR-7-aware Matcher
$matcher = new Matcher($mapper, $psr7Request);
$match = $matcher->getMatchDict();

// Determine controller from route
$controllerClass = $match['controller'] ?? 'home';

// If controller is a string (not FQCN), it's from legacy routes - convert to FQCN
if (!class_exists($controllerClass)) {
    $controllerClass = 'Horde\\Hordeweb\\Controller\\' . ucfirst($controllerClass);
}

// Instantiate PSR-15 controller
if (!class_exists($controllerClass)) {
    // Controller not found - 404
    $psr7Response = $responseFactory->createResponse(404, 'Not Found');
    $body = $streamFactory->createStream('<h1>404 Not Found</h1><p>Controller not found.</p>');
    $psr7Response = $psr7Response->withBody($body);
} else {
    $controller = new $controllerClass($injector, $responseFactory, $streamFactory);

    // Verify it implements RequestHandlerInterface
    if (!$controller instanceof RequestHandlerInterface) {
        throw new \RuntimeException(
            "Controller {$controllerClass} must implement RequestHandlerInterface"
        );
    }

    // Store route match in request attribute
    $psr7Request = $psr7Request->withAttribute('route', iterator_to_array($match));

    // Execute controller (returns PSR-7 response directly)
    $psr7Response = $controller->handle($psr7Request);
}

// Output response
$responseWriter = new ResponseWriterWeb();
$responseWriter->writeResponse($psr7Response);

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
use Horde\Controller\Request\Psr7Wrapper;
use Horde\Controller\Response\Psr7Adapter;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Server\RequestHandlerInterface;

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

// Determine controller
$controllerName = $match['controller'] ?? 'home';
$modernControllerClass = 'HordeWeb\\Controller\\' . ucfirst($controllerName);
$legacyControllerClass = 'HordeWeb_' . ucfirst($controllerName) . '_Controller';

// Check if modern PSR-15 controller exists
if (class_exists($modernControllerClass)) {
    // Instantiate modern controller
    $controller = new $modernControllerClass($injector, $responseFactory, $streamFactory);

    // Verify it implements RequestHandlerInterface
    if (!$controller instanceof RequestHandlerInterface) {
        throw new \RuntimeException(
            "Modern controller {$modernControllerClass} must implement RequestHandlerInterface"
        );
    }

    // Store route match in request attribute
    $psr7Request = $psr7Request->withAttribute('route', iterator_to_array($match));

    // Execute controller (returns PSR-7 response directly)
    $psr7Response = $controller->handle($psr7Request);

} elseif (class_exists($legacyControllerClass)) {
    // Legacy controller path
    $controller = new $legacyControllerClass($matcher);
    $controller->setInjector($injector);

    // Wrap PSR-7 request for legacy controller
    $legacyRequest = new Psr7Wrapper($psr7Request);

    // Create legacy response object
    $legacyResponse = new Horde_Controller_Response();

    // Execute controller
    $controller->processRequest($legacyRequest, $legacyResponse);

    // Convert legacy response to PSR-7
    $responseAdapter = new Psr7Adapter($responseFactory, $streamFactory);
    $psr7Response = $responseAdapter->createPsr7Response($legacyResponse);

} else {
    // No controller found - 404
    $psr7Response = $responseFactory->createResponse(404, 'Not Found');
    $body = $streamFactory->createStream('<h1>404 Not Found</h1><p>Controller not found.</p>');
    $psr7Response = $psr7Response->withBody($body);
}

// Output response
$responseWriter = new ResponseWriterWeb();
$responseWriter->writeResponse($psr7Response);

<?php declare(strict_types=1);

namespace Arspex;

use Auryn\Injector;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Symfony\Component\HttpFoundation\Request;
use Whoops\Handler\PrettyPageHandler;

require __DIR__ . '/../vendor/autoload.php';

$config = require('config.php');

/**
 * @var Injector $injector
 */
$injector = require('injector.php');

/**
 * Register the error handler
 */
$whoops = new \Whoops\Run();
if ($config['debug']) {
    $whoops->pushHandler(new PrettyPageHandler());
} else {
    /* TODO: Make something more meaningful */
    $whoops->pushHandler(function($e) {
        echo "Whoops!";
    });
}
$whoops->register();

$routeDispatcher = \FastRoute\simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/hello', ['Arspex\Controller\MainController', 'hello']);
    $r->addRoute('GET', '/world', ['Arspex\Controller\MainController', 'world']);
});

$request = $injector->make(Request::class);

$routeInfo = $routeDispatcher->dispatch(
    $request->getMethod(),
    $request->getRequestUri()
);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        echo '404 - Page not found';
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 - Method not allowed';
        break;
    case Dispatcher::FOUND:
        list($controllerClass, $method) = $routeInfo[1];
        $vars = $routeInfo[2];
        $controller = $injector->make($controllerClass);
        $controller->$method($vars);
        break;
}

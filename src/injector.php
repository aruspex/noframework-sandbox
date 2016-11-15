<?php declare(strict_types=1);

namespace Arspex;

use Arspex\Template\RendererInterface;
use Arspex\Template\TwigRenderer;
use Auryn\Injector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$config = require('config.php');
$injector = new Injector();

$injector->share(Request::class);
$injector->share(Response::class);

$injector->delegate(Request::class, function () {
    $request = Request::createFromGlobals();
    return $request;
});

$injector->alias(RendererInterface::class, TwigRenderer::class);
$injector->delegate(\Twig_Environment::class, function () use ($config) {
    $loader = new \Twig_Loader_Filesystem($config['templates_dir']);
    return new \Twig_Environment($loader);
});

return $injector;

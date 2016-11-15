<?php declare(strict_types=1);

namespace Arspex;

use Auryn\Injector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$injector = new Injector();

$injector->share(Request::class);
$injector->share(Response::class);

$injector->delegate(Request::class, function () {
    $request = Request::createFromGlobals();
    return $request;
});

return $injector;

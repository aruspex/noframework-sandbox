<?php declare(strict_types=1);

namespace Arspex;

use Whoops\Handler\PrettyPageHandler;

require __DIR__ . '/../vendor/autoload.php';

$config = require('config.php');

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

throw new \Exception("Some exception");

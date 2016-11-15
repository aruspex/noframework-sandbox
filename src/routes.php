<?php declare(strict_types=1);

namespace Arspex;

return [
    ['GET', '/hello', ['Arspex\Controller\MainController', 'hello']],
    ['GET', '/world', ['Arspex\Controller\MainController', 'world']]
];

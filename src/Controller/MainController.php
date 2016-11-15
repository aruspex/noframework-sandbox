<?php declare(strict_types=1);

namespace Arspex\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController
{
    private $request;
    private $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function __destruct()
    {
        $this->response->send();
    }

    public function hello()
    {
        $this->response->setContent('hello');
    }

    public function world()
    {
        $this->response->setContent('world');
    }
}

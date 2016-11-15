<?php declare(strict_types=1);

namespace Arspex\Controller;

use Arspex\Template\RendererInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response, RendererInterface $renderer)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function hello()
    {
        $this->response->setContent(
            $this->renderer->render('hello.html.twig')
        );
    }

    public function world()
    {
        $this->response->setContent('world');
    }
}

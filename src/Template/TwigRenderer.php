<?php declare(strict_types=1);

namespace Arspex\Template;

class TwigRenderer implements RendererInterface
{
    private $renderer;

    public function __construct(\Twig_Environment $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render($template, $data = []) : string
    {
        return $this->renderer->render($template, $data);
    }

}

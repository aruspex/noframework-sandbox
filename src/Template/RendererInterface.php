<?php declare(strict_types=1);

namespace Arspex\Template;

interface RendererInterface
{
    public function render($template, $data = []) : string;
}

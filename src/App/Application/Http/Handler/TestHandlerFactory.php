<?php

declare(strict_types=1);

namespace App\Application\Http\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class TestHandlerFactory
{
    public function __invoke(ContainerInterface $container): TestHandler
    {
        return new TestHandler(
            $container->get(TemplateRendererInterface::class)
        );
    }
}

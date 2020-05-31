<?php

declare(strict_types=1);

namespace App\Container;

use App\Application\Http\Middleware\LegacyAppMiddleware;
use Psr\Container\ContainerInterface;
use Zend_Application;

class LegacyAppMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): LegacyAppMiddleware
    {
        return new LegacyAppMiddleware(
            $container->get(Zend_Application::class)
        );
    }
}

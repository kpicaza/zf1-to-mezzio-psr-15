<?php

declare(strict_types=1);

namespace App\Application\Http\Middleware;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;
use Zend_Application;

class LegacyAppMiddleware implements MiddlewareInterface
{
    private Zend_Application $application;

    public function __construct(Zend_Application $application)
    {
        $this->application = $application;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            ob_start();
            $this->application->bootstrap()->run();
            $output = ob_get_contents();
            ob_end_clean();

            return new HtmlResponse($output);
        } catch (Throwable $exception) {
            return $handler->handle($request);
        }
    }
}

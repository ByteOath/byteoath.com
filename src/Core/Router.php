<?php

declare(strict_types=1);

namespace ByteOath\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Router
{
    private Dispatcher $dispatcher;
    private View       $view;

    public function __construct(View $view, callable $routeDefinition)
    {
        $this->view       = $view;
        $this->dispatcher = simpleDispatcher($routeDefinition);
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        // Strip base path if site is served from a sub-directory
        $basePath = Config::get('base_path', '');
        if ($basePath && str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath)) ?: '/';
        }

        $routeInfo = $this->dispatcher->dispatch($method, $uri);

        match ($routeInfo[0]) {
            Dispatcher::NOT_FOUND         => $this->notFound(),
            Dispatcher::METHOD_NOT_ALLOWED => $this->methodNotAllowed(),
            Dispatcher::FOUND             => $this->callHandler($routeInfo[1], $routeInfo[2]),
        };
    }

    private function callHandler(array $handler, array $vars): void
    {
        [$class, $method] = $handler;
        $controller = new $class($this->view);
        $controller->$method(...array_values($vars));
    }

    private function notFound(): void
    {
        http_response_code(404);
        $this->view->render('pages/404', ['title' => 'Page Not Found']);
    }

    private function methodNotAllowed(): void
    {
        http_response_code(405);
        echo 'Method Not Allowed';
    }
}


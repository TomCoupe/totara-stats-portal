<?php

use Jenssegers\Blade\Blade;
use Jenssegers\Blade\Container;
use Psr\Http\Message\ResponseInterface as Response;

/* Useful global helper functions */
if (!function_exists('view')) {
    function view(Response $response, $template, $with = []) {
        $views = __DIR__ . '/../resources/views';
        $cache = __DIR__ . '/../cache';

        $container = new Container();

        Container::setInstance($container);
        $blade = new Blade($views, $cache, $container);

        $blade = $blade->make($template, $with);

        $response->getBody()->write($blade->render());

        return $response;
    }
}
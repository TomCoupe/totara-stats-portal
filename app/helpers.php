<?php

use Jenssegers\Blade\Blade;
use Jenssegers\Blade\Container;
use Psr\Http\Message\ResponseInterface as Response;

/* Useful global helper functions */
if (!function_exists('view')) {
//    function view(Response $response, $template, $with = []) {
//        $views = __DIR__ . '/../resources/views';
//        $cache = __DIR__ . '/../cache';
//
//        $container = new Container();
//
//        Container::setInstance($container);
//        $blade = new Blade($views, $cache, $container);
//
//        $blade = $blade->make($template, $with);
//
//        $response->getBody()->write($blade->render());
//
//        return $response;
//    }

    function view($response, $template, $with = []) {
        $container = Container::getInstance();
        $views = dirname(__DIR__) . '/resources/views';
        $cache = dirname(__DIR__) . '/cache';

        // (safety) ensure view config present
        $config = $container->get('config');
        if (!$config->has('view.paths'))    $config->set('view.paths', [$views]);
        if (!$config->has('view.compiled')) $config->set('view.compiled', $cache);

        $blade = new Blade($views, $cache, $container);
        $html  = $blade->make($template, $with)->render();

        $response->getBody()->write($html);
        return $response;
    }
}
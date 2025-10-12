<?php

use Slim\App;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Jenssegers\Blade\Container;

return function (App $app) {
    function view(Response $response, $template, $with = []) {
        $views = __DIR__ . '/../resources/views';
        $cache = __DIR__ . '/../cache';

        $container = new Container();

        Container::setInstance($container);

        $blade = new Blade(
            $views,
            $cache,
            $container,
        );

        $blade = $blade->make($template, $with);

        $response->getBody()->write($blade->render());

        return $response;
    }

    $app->get('/home', function (Request $request, Response $response) {
        return view($response, 'content.home');
    });

    $app->get('/', function(Request $request, Response $response, $params) {
        $response->getBody()->write('Hello World');

        return $response;
    });
};
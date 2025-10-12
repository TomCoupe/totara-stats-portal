<?php

use Slim\App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {
    $app->get('/home', function (Request $request, Response $response) {
        return view($response, 'content.home');
    });

    $app->get('/', function(Request $request, Response $response, $params) {
        $response->getBody()->write('Hello World');

        return $response;
    });
};
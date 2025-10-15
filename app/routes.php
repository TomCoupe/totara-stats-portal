<?php

use App\Model\Project;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/home', function (Request $request, Response $response) {
        $projects = Project::all();

        return view(
            $response,
            'content.home',
            [
                'projects' => $projects
            ]
        );
    });

    $app->get('/', function(Request $request, Response $response, $params) {
        $response->getBody()->write('Hello World');

        return $response;
    });
};
<?php

use App\Model\Project;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/home', function (Request $request, Response $response) {
        $projects = Project::all();

        foreach ($projects as $project) {
            $plugins     = DB::table('project_plugins')->where('project_id', $project->id)->get();
            $completions = DB::table('project_course_completions')->where('project_id', $project->id)->get();

            $project->plugins     = $plugins;
            $project->completions = $completions;
        }

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
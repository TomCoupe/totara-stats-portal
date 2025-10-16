<?php

use App\Model\Project;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/home', function (Request $request, Response $response) {
        $projects = Project::all();

        $maxTotaraVersion = "0";
        $maxPhpVersion = "0";
        $maxMysqlVersion = "0";

        foreach ($projects as $project) {
            if (version_compare($project->php_version, $maxPhpVersion, "gt")) {
                $maxPhpVersion = $project->php_version;
            }

            if (version_compare($project->totara_version, $maxTotaraVersion, "gt")) {
                $maxTotaraVersion = $project->totara_version;
            }

            if (version_compare($project->mysql_version, $maxMysqlVersion, "gt")) {
                $maxMysqlVersion = $project->mysql_version;
            }

            $plugins     = DB::table('project_plugins')->where('project_id', $project->id)->get();
            $completions = DB::table('project_course_completions')->where('project_id', $project->id)->get();

            $project->plugins     = $plugins;
            $project->completions = $completions;
        }

        return view(
            $response,
            'content.home',
            [
                'projects' => $projects,
                'maxPhpVersion' => $maxPhpVersion,
                'maxTotaraVersion' => $maxTotaraVersion,
                'maxMysqlVersion' => $maxMysqlVersion
            ]
        );
    });

    $app->get('/', function(Request $request, Response $response, $params) {
        $response->getBody()->write('Hello World');

        return $response;
    });
};
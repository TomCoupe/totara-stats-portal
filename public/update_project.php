<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../bootstrap/eloquent.php';

/**
 * TODO: Add endpoint code to create/update projects
 */

$requestInput = file_get_contents('php://input');

$data = json_decode(trim($requestInput), true);

if ($data['api_key'] !== $_ENV['API_KEY']) {
    http_response_code(500);
    exit;
}

if ($data['project_key'] === '' || $data['project_key'] === null) {
    http_response_code(500);
    exit;
}

$success = DB::table('projects')->updateOrInsert(
    [
        'name' => $data['project_key']
    ],
    [
        'php_version'    => $data['php_version'],
        'mysql_version'  => $data['mysql_version'],
        'totara_version' => $data['totara_version'],
        'total_courses'  => $data['courses_total'],
        'total_users'    => $data['users_total'],
        'nginx_version'  => $data['nginx_version'],
        'active_users_three_months' => $data['three_month_users'],
        'active_users_one_year' => $data['year_users'],
        'total_logins'  => $data['total_logins']
    ]
);

$formattedPlugins = [];
$project          = DB::table('projects')
    ->where('name',  $data['project_key'])
    ->first();


foreach($data['plugins'] as $pluginPrefix) {
    foreach ($pluginPrefix as $plugin) {
        $formattedPlugins[$plugin['name']] = [
            'plugin_name' => $plugin['name'],
            'display_name' => $plugin['display_name'],
            'release' => $plugin['release'],
            'version' => $plugin['version'],
            'amount_used' => 0
        ];
    }
}

foreach ($data['plugin_usage'] as $plugin) {
    $formattedPlugins[$plugin['name']]['amount_used'] = $plugin['amount'] ?? 0;
}

foreach ($formattedPlugins as $plugin) {
    DB::table('project_plugins')->updateOrInsert(
        [
            'project_id'   => $project->id,
            'plugin_name'  => $plugin['plugin_name'],
        ],
        [
            'display_name' => $plugin['display_name'],
            'release'      => $plugin['release'],
            'version'      => $plugin['version'],
            'amount_used'  => $plugin['amount_used']
        ]
    );
}

// Remove old records of completion before saving
DB::table('project_course_completions')
    ->where('project_id', $project->id)
    ->delete();

foreach ($data['completions'] as $completion) {
    $date          = (new DateTime())->setTimestamp($completion['time_completed']);
    $formattedDate = $date->format('Y-m-d');

    DB::table('project_course_completions')->insert(
        [
            'project_id'      => $project->id,
            'course'          => $completion['course'],
            'completion_date' => $formattedDate
        ]
    );
}

http_response_code(200);
exit;

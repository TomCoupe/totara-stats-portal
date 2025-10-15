<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../bootstrap/eloquent.php';

/**
 * TODO: Add endpoint code to create/update projects
 */

$requestInput = file_get_contents('php://input');

$data = json_decode(trim($requestInput), true);

ray($data);

ray($_ENV);



if ($data['api_key'] !== $_ENV['API_KEY']) {
    ray('1');
    http_response_code(500);
    exit;
}

if ($data['project_key'] === '' || $data['project_key'] === null) {
    ray('2');
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

ray($success);

if ($success) {
    http_response_code(200);
} else {
    http_response_code(500);
}
exit;




<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Illuminate\Config\Repository as Config;
use Illuminate\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Facade;
use Bootstrap\AppContainer;

Dotenv::createImmutable(dirname(__DIR__))->safeLoad();

// Use our Laravel-like container
$container = new AppContainer(dirname(__DIR__));   // <-- project root
\Illuminate\Container\Container::setInstance($container);

$capsule = new Capsule($container);

$driver = $_ENV['DB_CONNECTION'] ?? 'mysql';

$capsule->addConnection([
    'driver'    => $driver,
    'host'      => $_ENV['DB_HOST']     ?? '127.0.0.1',
    'port'      => (int)($_ENV['DB_PORT'] ?? 3306),
    'database'  => $_ENV['DB_NAME']     ?? ($_ENV['DB_DATABASE'] ?? 'bestatsapp'),
    'username'  => $_ENV['DB_USER']     ?? ($_ENV['DB_USERNAME'] ?? 'root'),
    'password'  => $_ENV['DB_PASS']     ?? ($_ENV['DB_PASSWORD'] ?? ''),
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);

$events = new Dispatcher($container);

$capsule->setEventDispatcher($events);
$capsule->setAsGlobal();
$capsule->bootEloquent();

/** Config expected by console/migrations */
$connectionName = 'mysql';
$connection = [
    'driver'    => $driver,
    'host'      => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'port'      => (int)($_ENV['DB_PORT'] ?? 3306),
    'database'  => $_ENV['DB_NAME'] ?? ($_ENV['DB_DATABASE'] ?? 'bestatsapp'),
    'username'  => $_ENV['DB_USER'] ?? ($_ENV['DB_USERNAME'] ?? 'root'),
    'password'  => $_ENV['DB_PASS'] ?? ($_ENV['DB_PASSWORD'] ?? ''),
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
];

$container->instance('db', $capsule->getDatabaseManager());
$container->instance('events', $events);
$container->instance('config', new Config([
    'database.default'     => $connectionName,
    'database.connections' => [$connectionName => $connection],
    'database.migrations'  => 'migrations',
]));

$container->get('db')->setDefaultConnection($connectionName);

Facade::setFacadeApplication($container);

$container->instance('db.schema', $capsule->schema());

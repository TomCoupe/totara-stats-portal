<?php
declare(strict_types=1);

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

Dotenv::createImmutable(dirname(__DIR__))->safeLoad();

// one, unified container
$container = new \Bootstrap\AppContainer(dirname(__DIR__));
\Illuminate\Container\Container::setInstance($container);

// helpers + eloquent + vite helper
require __DIR__ . '/helpers.php';
require __DIR__ . '/../app/vite.php';
require __DIR__ . '/eloquent.php';

// ✅ load and apply settings here
($settings = require __DIR__ . '/../app/settings.php')($container);

// give Slim the same container
AppFactory::setContainer($container);
$app = AppFactory::create();

// now middleware & routes (they can read 'settings')
(require __DIR__ . '/../app/middleware.php')($app);
(require __DIR__ . '/../app/routes.php')($app);

$app->run();

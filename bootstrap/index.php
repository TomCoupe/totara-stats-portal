<?php
use DI\Container;
use Slim\Factory\AppFactory;
use App\Models\User;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Load env vars
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$container = new Container();

$settings = require __DIR__ . '/../app/settings.php';
$settings($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();

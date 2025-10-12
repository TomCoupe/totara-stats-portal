<?php
declare(strict_types=1);

use Illuminate\Container\Container;

/** Minimal app() helper */
if (!function_exists('app')) {
    function app(): Container
    {
        return Container::getInstance();
    }
}

/** base_path() helper */
if (!function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        $app = Container::getInstance();
        if (method_exists($app, 'basePath')) {
            return $app->basePath($path);
        }
        $root = dirname(__DIR__); // project root fallback
        return rtrim($root, '/\\') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }
}

/** database_path() helper */
if (!function_exists('database_path')) {
    function database_path(string $path = ''): string
    {
        $app = Container::getInstance();
        if (method_exists($app, 'databasePath')) {
            return $app->databasePath($path);
        }
        $db = base_path('database'); // fallback to ./database
        return rtrim($db, '/\\') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }
}


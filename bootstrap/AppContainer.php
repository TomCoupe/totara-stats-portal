<?php
declare(strict_types=1);

namespace Bootstrap;

use Illuminate\Container\Container;

class AppContainer extends Container
{
    private string $basePath;

    public function __construct(?string $basePath = null)
    {
        $this->basePath = $basePath ?? dirname(__DIR__); // project root
    }

    public function runningUnitTests(): bool
    {
        return false;
    }

    public function environment(string ...$environments): string|bool
    {
        $env = $_ENV['APP_ENV'] ?? 'production';
        return empty($environments) ? $env : in_array($env, $environments, true);
    }

    // Needed by MigrateMakeCommand
    public function basePath(string $path = ''): string
    {
        return rtrim($this->basePath, '/\\') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }

    // Used when no --path or to resolve relative paths
    public function databasePath(string $path = ''): string
    {
        $db = $this->basePath('database');
        return rtrim($db, '/\\') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }
}

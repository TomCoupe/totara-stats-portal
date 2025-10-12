<?php
declare(strict_types=1);

namespace Bootstrap;

use Illuminate\Container\Container;

class AppContainer extends Container
{
    private string $basePath;

    /** Keep it private and use a name that won't collide with bindings */
    private array $_termCallbacks = [];
    private bool $_shutdownHookRegistered = false;

    public function __invoke(string $abstract = null, array $parameters = [])
    {
        // If called with no args, just return the container instance
        if ($abstract === null) {
            return $this;
        }
        return $this->make($abstract, $parameters);
    }

    public function __construct(?string $basePath = null)
    {
//        parent::__construct();
        $this->basePath = $basePath ?? dirname(__DIR__);
        $this->registerShutdownHook();
    }

    private function registerShutdownHook(): void
    {
        if (!$this->_shutdownHookRegistered) {
            $this->_shutdownHookRegistered = true;
            register_shutdown_function(function () {
                $this->terminating(); // run queued callbacks
            });
        }
    }

    /* ---- Laravel-ish helpers some providers/console expect ---- */

    public function runningUnitTests(): bool
    {
        return false;
    }

    public function __toString(): string
    {
        return 'AppContainer';
    }

    public function environment(string ...$envs): string|bool
    {
        $env = $_ENV['APP_ENV'] ?? 'production';
        return $envs ? in_array($env, $envs, true) : $env;
    }

    public function basePath(string $path = ''): string
    {
        return rtrim($this->basePath, '/\\') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }

    public function databasePath(string $path = ''): string
    {
        $db = $this->basePath('database');
        return rtrim($db, '/\\') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }

    /**
     * Allow providers to register terminate callbacks.
     * - If called with no args, execute queued callbacks.
     * - If called with a callable, queue it.
     */
    public function terminating(callable $callback = null): void
    {
        if ($callback !== null) {
            $this->_termCallbacks[] = $callback;
            return;
        }

        // run and clear
        foreach ($this->_termCallbacks as $cb) {
            try { $cb(); } catch (\Throwable $e) { /* swallow */ }
        }
        $this->_termCallbacks = [];
    }
}

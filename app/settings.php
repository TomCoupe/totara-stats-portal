<?php
use Illuminate\Container\Container;

return function (Container $container): void {
    $env = $_ENV['APP_ENV'] ?? 'local';

    $settings = [
        // Slim error middleware flags (note: singular logError)
        'displayErrorDetails' => $env !== 'production',
        'logError'            => true,
        'logErrorDetails'     => true,

        // whatever else you want here
        'app' => [
            'name' => 'Totara Stats Portal',
            'env'  => $env,
        ],
    ];

    // ✅ bind a concrete array to the key "settings"
    $container->instance('settings', $settings);
};

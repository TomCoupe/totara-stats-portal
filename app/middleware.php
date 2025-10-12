<?php
use Slim\App;
use Illuminate\Container\Container as Ioc;

return function (App $app) {
    $settings = Ioc::getInstance()->get('settings'); // ← now exists

    $app->addErrorMiddleware(
        $settings['displayErrorDetails'] ?? false,
        $settings['logError']            ?? true,
        $settings['logErrorDetails']     ?? true
    );
};

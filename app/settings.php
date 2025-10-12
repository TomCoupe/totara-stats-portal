<?php

use \Psr\Container\ContainerInterface;
use Jenssegers\Blade\Blade;

return function (ContainerInterface $container) {
    $container->set('settings', function() {
        return [
            'displayErrorDetails' => true,
            'logErrors'           => true,
            'logErrorDetails'     => true
        ];
    });
};

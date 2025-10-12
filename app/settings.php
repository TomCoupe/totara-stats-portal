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

//    $container->set(Blade::class, function() {
//        $views = __DIR__ . '/../resources/views';
//        $cache = __DIR__ . '/../cache';
//
//        if (!is_dir($views)) mkdir($views, 0775, true);
//        if (!is_dir($cache)) mkdir($cache, 0775, true);
//
//        return new Blade($views, $cache); // Registers providers internally
//    });
};

<?php

return [
    'settings' => [
        'default_url' => 'https://dashinfo.net/',
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'doctrine' => [
            'dev_mode' => true,
            'cache_dir' => APP_ROOT . '/cache/doctrine',
            'metadata_dirs' => [APP_ROOT . '/Entity'],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'dbname',
                'user' => 'dbuser',
                'password' => 'dbpass',
                // 'charset' => 'utf-8',
            ]
        ]
    ]
];

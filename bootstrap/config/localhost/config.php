<?php

// read  credentials from dev_secrets.json
$creds = json_decode(file_get_contents(INC_ROOT . '/secrets/dev_secrets.json'), true);

return [
    'slimConfig' => [
        'settings' => [
            'httpVersion' => '1.1',
            'responseChunkSize' => 4096,
            'outputBuffering' => 'append',
            'determineRouteBeforeAppMiddleware' => true,
            'displayErrorDetails' => true,
        ],
    ],
    'app' => [
        'host' => 'http://localhost',
        'base_path' => $creds['DEV']['app.base_path'],
        'hash' => [
            'algo' => PASSWORD_BCRYPT,
            'cost' => 10
        ],
        'cdn' => $creds['DEV']['app.cdn'],
        'css' => $creds['DEV']['app.css'],
        'js' => $creds['DEV']['app.js'],
        'images' => $creds['DEV']['app.images'],
        'tmp' => '/tmp',
        'timezone' => 'Europe/London',
    ],
    'db' => [
        'driver' => 'sqlite',
        'host' => $creds['MYSQL']['HOST'],
        'database' => INC_ROOT . '/db/db.sqlite3',
        'username' => $creds['MYSQL']['USER'],
        'password' => $creds['MYSQL']['PASSWORD'],
        'port' => $creds['MYSQL']['PORT'],
        'tunnel' => $creds['MYSQL']['TUNNEL'],
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'stored_procedures' => false,
    ],
    'twig' => [
        'path' => '../resources/views/html',
        'debug' => true,
        'cache' => false,
    ],
    'csrf' => [
        'key' => 'csrf_token',
    ],
    'logger' => [
        'enabled' => true,
        'name' => $creds['DEV']['logger.name'],
        'path' => $creds['DEV']['logger.path'],
    ],
];

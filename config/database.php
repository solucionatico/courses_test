<?php

$config = [
    'mysql' => [
        'server' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'password' => 'root',
        'dbname' => 'courses',
    ],
    'sqlite' => [],
];

return [
    'mysql' => [
        'dsn' => 'mysql:host=' . $config['mysql']['server'] . ';port=' . $config['mysql']['port'] . ';dbname=' . $config['mysql']['dbname'] . ';charset=utf8',
        'user' => $config['mysql']['user'],
        'password' => $config['mysql']['password'],
    ],
    'sqlite' => [
        'dsn' => 'sqlite::memory:',
        'user' => null,
        'password' => null,
    ]
];

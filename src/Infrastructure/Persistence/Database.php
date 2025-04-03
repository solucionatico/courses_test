<?php

namespace App\Infrastructure\Persistence;

use PDO;

class Database extends PDO
{
    private static $instance = null;

    /** Prevent to instance **/
    private function __construct(array $config)
    {
        $connectionLink = 'mysql:host=' . $config['server'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'] . ';charset=utf8';
        parent::__construct($connectionLink, $config['user'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /** Correct way to get an instance **/
    public static function getInstance()
    {
        if (self::$instance === null) {
            $config = require _CONFIG_DIR_ . 'database.php';
            self::$instance = new Database($config);
        }
        return self::$instance;
    }
}

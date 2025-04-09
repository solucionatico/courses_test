<?php

namespace App\Infrastructure\Persistence;

use PDO;

/**
 * Database class type PDO to manage the DB connection as Singleton
 */
class Database extends PDO
{
    /**
     * @var Database|null Store a unique instance of Database
     */
    private static $instance = null;

    /**
     * Private constructor to prevent directly instance
     *
     * @param array $config Configuration of database connection array{server: string, port: int, dbname: string, user: string, password: string}
     */
    private function __construct(array $config)
    {
        parent::__construct($config['dsn'], $config['user'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /**
     * Get the unique instance of Database
     *
     * @return Database Instance of connection to Database
     */
    public static function getInstance(string $driver = 'mysql')
    {
        if (is_null(self::$instance)) {
            $config = require _CONFIG_DIR_ . 'database.php';
            self::$instance = new Database($config[$driver]);
        }
        return self::$instance;
    }
}

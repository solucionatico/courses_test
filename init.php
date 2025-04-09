<?php

/** Require vendor autoload - load all classes **/
require_once __DIR__ . '/vendor/autoload.php';

/** DEFINE CONST **/
define('_ROOT_DIR_', __DIR__ . '/');
define('_CONFIG_DIR_', _ROOT_DIR_ . 'config/');
define('_DB_DRIVER_', getenv('DRIVER') ?: 'mysql');

use App\Container;
use App\Infrastructure\Persistence\Database;

// Initialize database instance if not test
Container::set(Database::class, Database::getInstance(_DB_DRIVER_));

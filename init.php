<?php

/** Require vendor autoload - load all classes **/
require_once __DIR__ . '/vendor/autoload.php';

/** DEFINE CONST **/
define('_ROOT_DIR_', __DIR__ . '/');
define('_CONFIG_DIR_', _ROOT_DIR_ . 'config/');

use App\Container;
use App\Infrastructure\Persistence\Database;

// Initialize database instance
Container::set(Database::class, Database::getInstance());

<?php

namespace App;

/**
 * Container for dependency injection
 */

class Container
{
    /**
     * @var array<string, object> Store registered instances
     */
    private static array $instances = [];

    /**
     * Register a instance
     *
     * @param string $class Class name
     * @param object $instance Instance of class
     * @return void
     */
    public static function set(string $class, object $instance): void
    {
        self::$instances[$class] = $instance;
    }

    /**
     * Get an instance of class. If doesn't exists, create it
     *
     * @param string $class Class name
     * @param array $dependencies Dependencies to inject
     * @return object Instance of required class
     */
    public static function get(string $class, array $dependencies = []): object
    {
        // Return singleton instance
        if (isset(self::$instances[$class])) {
            return self::$instances[$class];
        }

        // Create instance and store it
        $instance = new $class(...$dependencies);
        self::$instances[$class] = $instance;

        return $instance;
    }
}

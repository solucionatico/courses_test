<?php

namespace App\Infrastructure\Console;

/**
 * Logger class to manage output message in console
 */
class Logger
{
    /**
     * Print a message line in console
     *
     * @param string $text Message to print
     * @return void
     */
    public static function print($text)
    {
        echo $text . PHP_EOL;
    }
}

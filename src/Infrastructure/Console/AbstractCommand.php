<?php

namespace App\Infrastructure\Console;

/**
 * Abstract Class to console commands
 */
abstract class AbstractCommand
{
    /**
     * Optional argument provided
     *
     * @var mixed
     */
    protected $argument = null;

    /**
     * Execute command
     *
     * Must be implemented for children classes
     *
     * @return void
     */
    abstract public function execute();

    /**
     * Set argument to command
     *
     * @param mixed $argument Argument to assign
     * @return void
     */
    public function setArgument($argument)
    {
        $this->argument = $argument;
    }
}

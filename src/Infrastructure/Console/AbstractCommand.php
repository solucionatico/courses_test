<?php

namespace App\Infrastructure\Console;

use App\Infrastructure\Persistence\Database;

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
     * @var Database Database instance
     */
    protected $db;

    /**
     * Constructor for SearchCommand
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

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

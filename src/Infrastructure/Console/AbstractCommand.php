<?php

namespace App\Infrastructure\Console;

abstract class AbstractCommand
{
    protected $argument = null;
    
    abstract public function execute();

    public function setArgument($argument)
    {
        $this->argument = $argument;
    }
}

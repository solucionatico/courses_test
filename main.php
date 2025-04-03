<?php

require __DIR__ . '/init.php';

use App\Infrastructure\Console\SearchCommand;
use App\Infrastructure\Console\InstallCommand;
use App\Infrastructure\Console\Logger;

// Define variables from arguments
$command = $argv[1];
$argument = $argv[2] ?? null;

// Create list of available commands
$commandList = [
    'search' => SearchCommand::class,
    'install' => InstallCommand::class,
];

// Validate command and execute
if (array_key_exists($command, $commandList)) {
    $commandClass = new $commandList[$command]();
    if ($argument) {
        $commandClass->setArgument($argument);
    }
    $commandClass->execute($argument);
} else {
    Logger::print('Comando no encontrado: ' . $command);
}

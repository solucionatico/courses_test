<?php

/** Main file **/

require __DIR__ . '/init.php';

use App\Container;
use App\Infrastructure\Persistence\Database;
use App\Infrastructure\Console\SearchCommand;
use App\Infrastructure\Console\InstallCommand;
use App\Infrastructure\Console\Logger;

// Define variables from arguments
$command = $argv[1];
$argument = $argv[2] ?? null;

// Create list of available commands
$db = Container::get(Database::class);
$commandList = [
    'search' => Container::get(SearchCommand::class, [ $db ]),
    'install' => Container::get(InstallCommand::class, [ $db ]),
];

// Validate command and execute
if (array_key_exists($command, $commandList)) {
    if ($argument) {
        $commandList[$command]->setArgument($argument);
    }
    $commandList[$command]->execute($argument);
} else {
    Logger::print('Comando no encontrado: ' . $command);
}

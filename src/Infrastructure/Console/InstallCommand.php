<?php

namespace App\Infrastructure\Console;

use App\Container;
use App\Infrastructure\Persistence\Database;

/**
 * Console command to install database structure and data for this project
 */
 class InstallCommand extends AbstractCommand
{
    /**
     * Execute install command
     */
    public function execute()
    {
        Logger::print('Installing DB...');

        $db = Container::get(Database::class);
        $sql = file_get_contents(_ROOT_DIR_ . 'install.sql');

        try {
            $db->exec($sql);
            Logger::print('Done.');
        } catch (Exception $ex) {
            Logger::print($ex->getTrace());
            exit();
        }

        return true;
    }
}

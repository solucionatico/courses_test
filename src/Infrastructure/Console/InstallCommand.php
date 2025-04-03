<?php

namespace App\Infrastructure\Console;

use App\Infrastructure\Persistence\Database;

class InstallCommand extends AbstractCommand
{
    public function execute()
    {
        Logger::print('Installing DB...');
        $db = Database::getInstance();
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

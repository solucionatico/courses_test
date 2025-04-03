<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Infrastructure\Persistence\Database;

class AbstractRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}

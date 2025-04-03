<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Infrastructure\Persistence\Database;

/**
 * Abstract class to repository
 *
 * Provide access to database to classes extends this class
 */
class AbstractRepository
{
    /**
     * @var Database Database instance
     */
    protected Database $db;

    /**
     * Class constructor
     *
     * @param Database $db Database instance to manage connection
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
}

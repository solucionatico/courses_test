<?php

namespace App\Domain\Repository;

/**
 * Interface RepositoryInterface
 *
 * Defines the contract for repositories that allow entities to be searched by name
 */
interface RepositoryInterface
{
    /**
     * Search entities by name
     *
     * @param string $name Name or term to search
     * @return array List of results found
     */
    public function findByName(string $name);
}

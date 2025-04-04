<?php

namespace App\Domain\UseCase;

use App\Domain\Repository\RepositoryInterface;

/**
 * Abstract class for use cases to search by name
 *
 * Provides common logic to search entities based on a partial term of name
 * Require a minimum of 3 characters
 */
abstract class AbstractFindByNameUseCase
{
    /**
     * @var RepositoryInterface repository instance
     */
    private RepositoryInterface $repository;

    /**
     * Constructor for AbstractFindByNameUseCase
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository) {
        $this->repository = $repository;
    }

    /**
     * Executes the search use case
     *
     * @param string $name Name or term to find
     * @return array List of Entity results or empty if name is shorter than 3 characters
     */
    public function execute(string $name)
    {
        if (strlen($name) < 3) {
            return [];
        }
        $minName = substr($name, 0, 3);

        return $this->repository->findByName($minName);
    }
}

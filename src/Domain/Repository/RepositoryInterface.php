<?php

namespace App\Domain\Repository;

interface RepositoryInterface
{
    public function findByName(string $name);
}

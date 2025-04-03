<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\RepositoryInterface;
use App\Infrastructure\Persistence\Mapper\ClassMapper;

/**
 * Repository of Class Entity
 * Query manager for `classes` table
 */
class ClassRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     * Search classes by name
     *
     * @param string $name Name or term to search
     * @return array List of classes mapped to DTO objects
     */
    public function findByName(string $name) {
        if (strlen($name) < 3) {
            return [];
        }
        $minName = substr($name, 0, 3);

        // Prepare query
        $stmt = $this->db->prepare('SELECT * FROM `classes` WHERE `name` LIKE :name');
        $stmt->execute(['name' => '%' . $minName . '%']);
        $result = $stmt->fetchAll();

        // Fill results in Entity
        $classList = [];
        foreach ($result as $row) {
            $classList[] = ClassMapper::map($row);
        }

        return $classList;
    }
}

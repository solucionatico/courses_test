<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\ClassRepositoryInterface;
use App\Domain\Entity\ClassEntity;

/**
 * Repository of Class Entity
 * Query manager for `classes` table
 */
class ClassRepository extends AbstractRepository implements ClassRepositoryInterface
{
    /**
     * Search classes by name
     *
     * @param string $name Name or term to search
     * @return array List of ClassEntity
     */
    public function findByName(string $name) {
        // Prepare query
        $stmt = $this->db->prepare('SELECT * FROM `classes` WHERE `name` LIKE :name');
        $stmt->execute(['name' => '%' . $name . '%']);
        $result = $stmt->fetchAll();

        // Fill results as Entity
        $entityList = [];
        foreach ($result as $row) {
            $entityList[] = new ClassEntity(
                $row['id_class'],
                $row['name'],
                $row['score'],
                $row['base_score']
            );
        }

        return $entityList;
    }
}

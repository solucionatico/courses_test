<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\RepositoryInterface;
use App\Domain\Entity\ClassEntity;

class ClassRepository extends AbstractRepository implements RepositoryInterface
{
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
            $classList[] = new ClassEntity($row['id_class'], $row['name'], $row['score'], $row['base_score']);
        }

        return $classList;
    }
}

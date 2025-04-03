<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\RepositoryInterface;
use App\Domain\Entity\ExamEntity;
use App\Domain\Entity\ExamTypeEntity;

class ExamRepository extends AbstractRepository implements RepositoryInterface
{
    public function findByName(string $name) {
        if (strlen($name) < 3) {
            return [];
        }
        $minName = substr($name, 0, 3);

        // Prepare query
        $stmt = $this->db->prepare(
            'SELECT e.*, et.id_exam_type, et.name AS exam_type_name
             FROM `exam` e
             INNER JOIN `exam_type` et ON e.id_exam_type = et.id_exam_type
             WHERE e.name LIKE :name'
        );
        $stmt->execute(['name' => '%' . $minName . '%']);
        $result = $stmt->fetchAll();

        // Fill results in Entity
        $examList = [];
        foreach ($result as $row) {
            $examType = new ExamTypeEntity($row['id_exam_type'], $row['exam_type_name']);
            $examList[] = new ExamEntity($row['id_exam'], $row['name'], $examType);
        }

        return $examList;
    }
}

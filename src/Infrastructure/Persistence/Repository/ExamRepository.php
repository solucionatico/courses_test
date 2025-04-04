<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\ExamRepositoryInterface;
use App\Domain\Entity\ExamEntity;
use App\Domain\Entity\ExamTypeEntity;

/**
 * Repository of Exam Entity
 * Query manager for `exam` table
 */
class ExamRepository extends AbstractRepository implements ExamRepositoryInterface
{
    /**
     * Search exams by name
     *
     * @param string $name Name or term to search
     * @return array List of exams mapped to DTO objects
     */
    public function findByName(string $name) {
        // Prepare query
        $stmt = $this->db->prepare(
            'SELECT e.*, et.id_exam_type, et.name AS exam_type_name
             FROM `exam` e
             INNER JOIN `exam_type` et ON e.id_exam_type = et.id_exam_type
             WHERE e.name LIKE :name'
        );
        $stmt->execute(['name' => '%' . $name . '%']);
        $result = $stmt->fetchAll();

        // Fill results as Entity
        $entityList = [];
        foreach ($result as $row) {
            $examTypeEntity = new ExamTypeEntity($row['id_exam_type'], $row['exam_type_name']);
            $entityList[] = new ExamEntity(
                $row['id_exam'],
                $row['name'],
                $examTypeEntity
            );
        }

        return $entityList;
    }
}

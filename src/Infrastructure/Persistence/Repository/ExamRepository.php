<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\RepositoryInterface;
use App\Infrastructure\Persistence\Mapper\ExamMapper;

/**
 * Repository of Exam Entity
 * Query manager for `exam` table
 */
class ExamRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     * Search exams by name
     *
     * @param string $name Name or term to search
     * @return array List of exams mapped to DTO objects
     */
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
            $examList[] = ExamMapper::map($row);
        }

        return $examList;
    }
}

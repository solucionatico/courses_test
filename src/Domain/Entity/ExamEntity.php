<?php

namespace App\Domain\Entity;

/**
 * Entity of Exam in Domain
 */
class ExamEntity extends AbstractEntity
{
    /**
     * Store the ExamType associate to Entity
     * @var ExamTypeEntity $examType
     */
    private $examType;

    /**
     * ExamEntity constructor
     *
     * @param int $id ID of ExamType
     * @param string $name Name of ExamType
     * @param ExamTypeEntity $examType ExamType associate
     */
    public function __construct(int $id, string $name, ExamTypeEntity $examType)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setExamType($examType);
    }

    /**
     * Get the ExamType
     *
     * @return ExamTypeEntity
     */
    public function getExamType()
    {
        return $this->examType;
    }

    /**
     * Set the exam type
     *
     * @param ExamTypeEntity $examType ExamType to assign
     */
    public function setExamType(ExamTypeEntity $examType)
    {
        $this->examType = $examType;
    }
}

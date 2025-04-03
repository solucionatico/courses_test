<?php

namespace App\Domain\Entity;

class ExamEntity extends AbstractEntity
{
    private $examType;

    public function __construct(int $id, string $name, ExamTypeEntity $examType)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setExamType($examType);
    }

    // Getters
    public function getExamType()
    {
        return $this->examType;
    }

    // Setters
    public function setExamType(ExamTypeEntity $examType)
    {
        $this->examType = $examType;
    }
}

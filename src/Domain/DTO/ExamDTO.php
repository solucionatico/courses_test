<?php

namespace App\Domain\DTO;

/**
 * Data Transfer Object (DTO) for Exam
 */
class ExamDTO
{
    /**
     * @var int $id Identifier of Exam
     */
    public $id;

    /**
     * @var string $name Name of Exam
     */
    public $name;

    /**
     * @var ExamTypeDTO $examType ExamType associate to Entity
     */
    public ExamTypeDTO $examType;

    /**
     * ExamTypeDTO constructor.
     *
     * @param int $id Identifier of Exam
     * @param string $name Name of Exam
     * @param ExamTypeDTO $examType ExamType associate to Entity
     */
    public function __construct(int $id, string $name, ExamTypeDTO $examType) {
        $this->id = $id;
        $this->name = $name;
        $this->examType = $examType;
    }
}

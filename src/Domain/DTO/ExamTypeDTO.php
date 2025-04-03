<?php

namespace App\Domain\DTO;

/**
 * Data Transfer Object (DTO) for Exam Type
 */
class ExamTypeDTO
{
    /**
     * @var int $id Identifier of ExamType
     */
    public $id;

    /**
     * @var string $name Name of ExamType
     */
    public $name;

    /**
     * ExamTypeDTO constructor
     *
     * @param int $id Identifier of ExamType
     * @param string $name Name of ExamType
     */
    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

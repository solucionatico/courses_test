<?php

namespace App\Domain\Entity;

/**
 * Entity of ExamType in Domain
 */
class ExamTypeEntity extends AbstractEntity
{
    /**
     * ExamTypeEntity constructor
     *
     * @param int $id ID of ExamType
     * @param string $name Name of ExamType
     */
    public function __construct(int $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);
    }
}

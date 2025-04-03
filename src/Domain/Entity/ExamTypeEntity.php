<?php

namespace App\Domain\Entity;

class ExamTypeEntity extends AbstractEntity
{
    public function __construct(int $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);
    }
}

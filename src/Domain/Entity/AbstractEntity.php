<?php

namespace App\Domain\Entity;

abstract class AbstractEntity
{
    private $id;
    private $name;

    /** Getters **/
    public function getId() {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    /** Setters **/
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}

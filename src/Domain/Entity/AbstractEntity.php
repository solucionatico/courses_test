<?php

namespace App\Domain\Entity;

/**
 * Abstract class for Entities
 */
abstract class AbstractEntity
{
    /**
     * @var int $id Identifier of the entity
     */
    private $id;

    /**
     * @var string $name Name of the entity
     */
    private $name;

    /**
     * Gets identifier
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Gets entity name
     *
     * @return int
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the Identifier
     *
     * @param int $id Identifier.
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Sets the name
     *
     * @param string $name Entity name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}

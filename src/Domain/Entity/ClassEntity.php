<?php

namespace App\Domain\Entity;

/**
 * Entity of Class in Domain
 */
class ClassEntity extends AbstractEntity
{
    /**
     * @var int $score Score of class
     */
    private $score;

    /**
     * @var int $baseScore base score of class
     */
    private $baseScore;

    /**
     * ClassEntity constructor.
     *
     * @param int $id ID of Class.
     * @param string $name Name of class.
     * @param int $score Score of class.
     * @param int $baseScore Maximum possible score of class.
     */
    public function __construct(int $id, string $name, int $score, int $baseScore)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setScore($score);
        $this->setBaseScore($baseScore);
    }

    /**
     * Gets the score of Class
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Gets the base score of Class
     *
     * @return int
     */
    public function getBaseScore()
    {
        return $this->baseScore;
    }

    /**
     * Sets the score of class.
     *
     * @param int $score Score of class
     */
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    /**
     * Sets the score of class.
     *
     * @param int $baseScore Base score of class
     */
    public function setBaseScore(int $baseScore)
    {
        $this->baseScore = $baseScore;
    }
}

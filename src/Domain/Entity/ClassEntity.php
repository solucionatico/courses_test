<?php

namespace App\Domain\Entity;

class ClassEntity extends AbstractEntity
{
    private $id;
    private $name;
    private $score;
    private $baseScore;

    public function __construct(int $id, string $name, int $score, int $baseScore)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setScore($score);
        $this->setBaseScore($baseScore);
    }

    // Getters
    public function getScore()
    {
        return $this->score;
    }

    public function getBaseScore()
    {
        return $this->baseScore;
    }

    // Setters
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    public function setBaseScore(int $baseScore)
    {
        $this->baseScore = $baseScore;
    }
}

<?php

namespace App\Domain\DTO;

/**
 * Data Transfer Object (DTO) for Class
 */
class ClassDTO
{
    /**
     * @var int $id Identifier of Class
     */
    public $id;

    /**
     * @var string $name Name of Class
     */
    public $name;

    /**
     * @var int $score Score of Class
     */
    public $score;

    /**
     * @var int $baseScore Base score of Class
     */
    public $baseScore;

    /**
     * ClassDTO constructor.
     *
     * @param int $id Identifier of Class
     * @param string $name Name of Class
     * @param int $score Score of Class
     * @param int $baseScore  Base score of Class
     */
    public function __construct(int $id, string $name, int $score, int $baseScore) {
        $this->id = $id;
        $this->name = $name;
        $this->score = $score;
        $this->baseScore = $baseScore;
    }
}

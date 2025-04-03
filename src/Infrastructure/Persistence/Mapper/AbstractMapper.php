<?php

namespace App\Infrastructure\Persistence\Mapper;

use App\Infrastructure\Persistence\Database;

/**
 * Abstract class to entity mappers to DTO Objects
 */
abstract class AbstractMapper
{
    /**
     * Map an data array to a DTO Object
     *
     * @param array $data Data from database
     * @return ExamDTO DTO Object with mapped data
     */
    abstract public static function map(array $data);
}

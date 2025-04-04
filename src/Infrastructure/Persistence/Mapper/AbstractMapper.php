<?php

namespace App\Infrastructure\Persistence\Mapper;

use App\Infrastructure\Persistence\Database;

/**
 * Abstract class to entity mappers to DTO Objects
 */
abstract class AbstractMapper
{
    /**
     * Map a Entity array to a DTO Object
     *
     * @param array $entityList
     * @return array DTO
     */

    abstract public static function mapDTO(array $result);
}

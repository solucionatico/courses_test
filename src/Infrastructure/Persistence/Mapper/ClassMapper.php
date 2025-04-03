<?php

namespace App\Infrastructure\Persistence\Mapper;

use App\Domain\DTO\ClassDTO;

/**
 * Class to mapping data to DTO Objects
 */
class ClassMapper extends AbstractMapper
{
    /**
     * Map an data array to a DTO Object
     *
     * @param array $data Data from database
     * @return ExamDTO DTO Object with mapped data
     */
    public static function map(array $data)
    {
        return new ClassDTO(
            $data['id_class'],
            $data['name'],
            (int) $data['score'],
            (int) $data['base_score']
        );
    }
}

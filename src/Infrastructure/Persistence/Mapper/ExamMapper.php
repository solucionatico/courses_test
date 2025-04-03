<?php

namespace App\Infrastructure\Persistence\Mapper;

use App\Container;
use App\Domain\DTO\ExamDTO;
use App\Domain\DTO\ExamTypeDTO;

/**
 * Class to mapping data to DTO Objects
 */
class ExamMapper extends AbstractMapper
{
    /**
     * Map an data array to a DTO Object
     *
     * @param array $data Data from database
     * @return ExamDTO DTO Object with mapped data
     */
    public static function map(array $data)
    {
        return new ExamDTO(
            $data['id_exam'],
            $data['name'],
            new ExamTypeDTO($data['id_exam_type'], $data['exam_type_name'])
        );
    }
}

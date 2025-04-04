<?php

namespace App\Infrastructure\Persistence\Mapper;

use App\Domain\Entity\ExamEntity;
use App\Infrastructure\Persistence\DTO\ExamDTO;
use App\Infrastructure\Persistence\DTO\ExamTypeDTO;

/**
 * Class to mapping data to DTO Objects
 */
class ExamMapper extends AbstractMapper
{
    /**
     * Map an data array to a DTO Object
     *
     * @param ExamEntity[] $entityList
     * @return ExamDTO[]
     */
    public static function mapDTO(array $entityList)
    {
        $classList = [];

        /** @var ExamEntity $entity */
        foreach($entityList as $entity) {
            $examTypeDTO = new ExamTypeDTO(
                $entity->getExamType()->getId(),
                $entity->getExamType()->getName()
            );
            $classList[] = new ExamDTO(
                $entity->getId(),
                $entity->getName(),
                $examTypeDTO
            );
        }

        return $classList;
    }
}

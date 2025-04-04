<?php

namespace App\Infrastructure\Persistence\Mapper;

use App\Domain\Entity\ClassEntity;
use App\Infrastructure\Persistence\DTO\ClassDTO;

/**
 * Class to mapping data to DTO Objects
 */
class ClassMapper extends AbstractMapper
{
    /**
     * Map an data array to a DTO Object
     *
     * @param ClassEntity[] $entityList
     * @return ClassDTO[]
     */
    public static function mapDTO(array $entityList)
    {
        $classDTOList = [];

        /** @var ClassEntity $entity */
        foreach($entityList as $entity) {
            $classDTOList[] = new ClassDTO(
                $entity->getId(),
                $entity->getName(),
                $entity->getScore(),
                $entity->getBaseScore()
            );
        }

        return $classDTOList;
    }
}

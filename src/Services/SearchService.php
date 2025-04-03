<?php

namespace App\Services;

use App\Infrastructure\Persistence\Repository\ClassRepository;
use App\Infrastructure\Persistence\Repository\ExamRepository;

class SearchService
{
    private $classRepository;

    public function __construct()
    {
        $this->classRepository = new ClassRepository();
        $this->examRepository = new ExamRepository();
    }

    private function searchClasses(string $name)
    {
        $classList = [];

        $result = $this->classRepository->findByName($name);

        foreach ($result as $entity) {
            $classList[] = [
                'name' => $entity->getName(),
                'score' => $entity->getScore(),
                'base_score' => $entity->getBaseScore(),
            ];
        }

        return $classList;
    }

    private function searchExams(string $name)
    {
        $examList = [];

        $result = $this->examRepository->findByName($name);

        foreach ($result as $entity) {
            $examList[] = [
                'name' => $entity->getName(),
                'type' => $entity->getExamType()->getName(),
            ];
        }

        return $examList;
    }

    public function search(string $name)
    {
        return [
            'classes' => $this->searchClasses($name),
            'exams' => $this->searchExams($name),
        ];
    }
}

<?php

namespace App\Services;

use App\Infrastructure\Persistence\Repository\ClassRepository;
use App\Infrastructure\Persistence\Repository\ExamRepository;

/**
 * Service to search classes and exams by name
 */

class SearchService
{
    /**
     * @var ClassRepository Class repository
     */
    private ClassRepository $classRepository;

    /**
     * @var ExamRepository Exam repository
     */
    private ExamRepository $examRepository;

    /**
     * SearchService constructor
     *
     * @param ClassRepository $classRepository Class repository
     * @param ExamRepository $examRepository Exam repository
     */
    public function __construct(ClassRepository $classRepository, ExamRepository $examRepository)
    {
        $this->classRepository = $classRepository;
        $this->examRepository = $examRepository;
    }

    /**
     * Search classes by name
     *
     * @param string $name Part of name to search (search first 3 letters)
     * @return array<array{name: string, score: int, base_score: int}> List of classes found
     */
    private function searchClasses(string $name)
    {
        $classList = [];

        $result = $this->classRepository->findByName($name);

        foreach ($result as $classDTO) {
            $classList[] = [
                'name' => $classDTO->name,
                'score' => $classDTO->score,
                'base_score' => $classDTO->baseScore,
            ];
        }

        return $classList;
    }

    /**
     * Search exams by name
     *
     * @param string $name Part of name to search (search first 3 letters)
     * @return array<array{name: string, type: string}> List of exams found
     */
    private function searchExams(string $name)
    {
        $examList = [];

        $result = $this->examRepository->findByName($name);

        foreach ($result as $examDTO) {
            $examList[] = [
                'name' => $examDTO->name,
                'type' => $examDTO->examType->name,
            ];
        }

        return $examList;
    }

    /**
     * Search by term in classes and exams
     *
     * @param string $name Term to search (search by first 3 letters of term)
     * @return array{
     *     classes: array<array{name: string, score: int, base_score: int}>,
     *     exams: array<array{name: string, type: string}>
     * } Result of search with classes and exams
     */
    public function search(string $name)
    {
        return [
            'classes' => $this->searchClasses($name),
            'exams' => $this->searchExams($name),
        ];
    }
}

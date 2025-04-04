<?php

namespace App\Infrastructure\Console;

use App\Container;
use App\Infrastructure\Persistence\Repository\ClassRepository;
use App\Infrastructure\Persistence\Repository\ExamRepository;
use App\Infrastructure\Persistence\Mapper\ClassMapper;
use App\Infrastructure\Persistence\Mapper\ExamMapper;
use App\Domain\UseCase\FindClassByNameUseCase;
use App\Domain\UseCase\FindExamByNameUseCase;

/**
 * Console command to make searchers in Classes and Exams
 */
class SearchCommand extends AbstractCommand
{
    /**
     * Execute search command with argument provided
     */
    public function execute()
    {
        if (empty($this->argument)) {
            Logger::print('Argument is empty');
            exit;
        }

        $this->searchClass();
        $this->searchExam();

        Logger::print('------------------------');
        Logger::print('Finished');
        exit;
    }

    /**
     * Search for classes with term
     */
    private function searchClass()
    {
        $findClassUseCase = Container::get(FindClassByNameUseCase::class, [
            Container::get(ClassRepository::class, [ $this->db ])
        ]);

        $classEntityList = $findClassUseCase->execute($this->argument);

        // Map Entity to DTO
        $classDTOList = ClassMapper::mapDTO($classEntityList);
        foreach ($classDTOList as $classDTO) {
            Logger::print('Clase: ' . $classDTO->name . ' | ' . $classDTO->score . '/' . $classDTO->baseScore);
        }
    }

    /**
     * Search for exams with term
     */
    private function searchExam()
    {
        $findExamUseCase = Container::get(FindExamByNameUseCase::class, [
            Container::get(ExamRepository::class, [ $this->db ])
        ]);

        $examEntityList = $findExamUseCase->execute($this->argument);

        // Map Entity to DTO
        $examDTOList = ExamMapper::mapDTO($examEntityList);
        foreach ($examDTOList as $examDTO) {
            Logger::print('Examen: ' . $examDTO->name . ' | ' . $examDTO->examType->name);
        }
    }
}

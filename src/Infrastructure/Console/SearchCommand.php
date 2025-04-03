<?php

namespace App\Infrastructure\Console;

use App\Container;
use App\Infrastructure\Persistence\Database;
use App\Infrastructure\Persistence\Repository\ClassRepository;
use App\Infrastructure\Persistence\Repository\ExamRepository;
use App\Services\SearchService;

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

        /** Init the search service **/
        $db = Container::get(Database::class);
        $searchService = Container::get(SearchService::class, [
            Container::get(ClassRepository::class, [ $db ]),
            Container::get(ExamRepository::class, [ $db ]),
        ]);

        $result = $searchService->search($this->argument);

        foreach ($result['classes'] as $row) {
            Logger::print('Clase: ' . $row['name'] . ' | ' . $row['score'] . '/' . $row['base_score']);
        }

        foreach ($result['exams'] as $row) {
            Logger::print('Examen: ' . $row['name'] . ' | ' . $row['type']);
        }

        Logger::print('------------------------');
        Logger::print('Finished');
        exit;
    }
}

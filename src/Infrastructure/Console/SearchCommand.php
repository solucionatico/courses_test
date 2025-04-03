<?php

namespace App\Infrastructure\Console;

use App\Services\SearchService;

class SearchCommand extends AbstractCommand
{
    public function execute()
    {
        if (empty($this->argument)) {
            Logger::print('Argument is empty');
            return false;
        }

        /** Init the search service **/
        $searchService = new SearchService();
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

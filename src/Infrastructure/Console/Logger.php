<?php

namespace App\Infrastructure\Console;

class Logger
{
    public static function print($text)
    {
        echo $text . PHP_EOL;
    }

    // public function printTable(Array $data, Array $headers = [])
    // {
    //     if (empty($data)) {
    //         return;
    //     }
    //     if (empty($headers)) {
    //         $headers = array_keys($data[0]);
    //     }
    //
    //     var_dump($headers);
    // }

    public function printTable(array $data, array $headers = [])
    {
        if (empty($data)) {
            return;
        }
        if (empty($headers)) {
            $headers = array_keys($data[0]);
        }

        // Calculate column's width
        $dataKeys = array_keys($data[0]);
        $columnWidths = [];
        foreach ($headers as $index => $header) {
            $columnWidths[$index] = strlen($header);
            foreach ($data as $key => $row) {
                $columnWidths[$index] = max($columnWidths[$index], strlen((string) $row[$dataKeys[$index]]));
            }
        }

        // Print top line
        $separator = '+';
        foreach ($columnWidths as $width) {
            $separator .= str_repeat('-', $width + 2) . '+';
        }
        self::print($separator);

        // Print headers
        echo '| ';
        foreach ($headers as $index => $header) {
            echo str_pad($header, $columnWidths[$index]) . ' | ';
        }
        echo PHP_EOL . $separator . PHP_EOL;

        // Print rows
        foreach ($data as $row) {
            echo '| ';
            foreach ($row as $key => $label) {
                echo str_pad($label, $columnWidths[array_search($key, $dataKeys)]) . ' | ';
            }
            echo PHP_EOL;
        }

        // Print bottom line
        self::print($separator);
    }
}

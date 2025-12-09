<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;


final class CLITools
{
    public function readInput(): string
    {
        $fin = fopen('php://stdin', 'r');
        return trim(fgets($fin));
    }

    public function writeNewLine(string $line): void
    {
        echo $line;
        echo "\r\n";
    }
}
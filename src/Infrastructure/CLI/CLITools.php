<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;

final class CLITools
{
    public function readLine(): string
    {
        $fin = fopen('php://stdin', 'r');
        return fgets($fin);
    }

    public function writeLine(string $line): void
    {
        echo $line;
    }

    public function writeLineBreak(string $line): void
    {
        echo $line;
        echo "\r\n";
    }
}
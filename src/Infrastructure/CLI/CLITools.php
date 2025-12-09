<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;


use Lokil\SolidWeatherApp\Domain\Weather\Port\UIInterface;

final class CLITools implements UIInterface
{
    public function readInput(): string
    {
        $fin = fopen('php://stdin', 'r');
        return fgets($fin);
    }

    public function writeNewLine(string $line): void
    {
        echo $line;
        echo "\r\n";
    }
}
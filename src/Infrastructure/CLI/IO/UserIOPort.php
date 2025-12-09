<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\IO;

interface UserIOPort
{
    public function readInput(): string;

    public function writeNewLine(string $line): void;
}
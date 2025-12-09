<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Domain\Weather\Port;

interface UIInterface
{
    public function readInput(): string;

    public function writeNewLine(string $line): void;
}
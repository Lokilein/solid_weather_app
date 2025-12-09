<?php
declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;

class EntryPoint
{
    public function do(): void
    {
        $cliTools = new CliTools();
        $cliTools->writeLineBreak("Hello World!");
    }
}
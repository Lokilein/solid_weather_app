<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp;

use Lokil\SolidWeatherApp\Infrastructure\CLI\EntryPoint;

final class Start
{
    public static function run(): void
    {
        if(php_sapi_name() === 'cli')
        {
            $entryPoint = new EntryPoint();
            $entryPoint->do();
        }
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;


use Lokil\SolidWeatherApp\Infrastructure\CLI\Factory\WeatherCLIFactory;

class EntryPoint
{
    public function do(): void
    {
        $factory = new WeatherCLIFactory();
        $factory()->run();
    }
}
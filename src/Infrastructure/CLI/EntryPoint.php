<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;


use Lokil\SolidWeatherApp\Infrastructure\CLI\Factory\GetCityWeatherFactory;

class EntryPoint
{
    public function do(): void
    {
        $factory = new GetCityWeatherFactory();
        $factory()->run();
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;

use Lokil\SolidWeatherApp\Infrastructure\CLI\Factory\WeatherAppFactory;

class EntryPoint
{
    public function do(): void
    {
        $weatherAppFactory = new WeatherAppFactory();
        $weatherAppFactory->build()->do();
    }
}
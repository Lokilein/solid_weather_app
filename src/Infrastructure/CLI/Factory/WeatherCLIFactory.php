<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\CLIUserIOPort;
use Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint\CityWeather;

final class WeatherCLIFactory
{
    public function __invoke(): CityWeather
    {
        return new CityWeather(new CLIUserIOPort());
    }
}
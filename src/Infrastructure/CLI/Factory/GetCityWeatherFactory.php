<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\CLIUserIOPort;
use Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint\GetCityWeather;

final class GetCityWeatherFactory
{
    public function __invoke(): GetCityWeather
    {
        return new GetCityWeather(new CLIUserIOPort());
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Application\GetCityWeatherUseCase;
use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\CLIUserIOPort;
use Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint\GetCityWeather;
use Lokil\SolidWeatherApp\Infrastructure\HTTP\WeatherAPIRequest;

final class GetCityWeatherFactory
{
    public function __invoke(): GetCityWeather
    {
        return new GetCityWeather(
            new CLIUserIOPort(),
            new GetCityWeatherUseCase(new WeatherAPIRequest()));
    }
}
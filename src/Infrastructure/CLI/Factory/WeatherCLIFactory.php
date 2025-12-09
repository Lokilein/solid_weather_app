<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Infrastructure\CLI\CLITools;
use Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoints\WeatherCLI;

final class WeatherCLIFactory
{
    public function __invoke(): WeatherCLI
    {
        return new WeatherCLI(new CLITools());
    }
}
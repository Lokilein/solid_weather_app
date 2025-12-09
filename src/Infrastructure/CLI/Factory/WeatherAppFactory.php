<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Domain\Weather\Adapter\WeatherApp;
use Lokil\SolidWeatherApp\Infrastructure\CLI\CLITools;

final class WeatherAppFactory
{
    public function build(): WeatherApp
    {
        return new WeatherApp(new CLITools());

    }
}
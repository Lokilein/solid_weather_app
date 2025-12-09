<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoints\WeatherCLI;

final class WeatherCLIFactory
{
    public function __invoke(): WeatherCLI
    {
        $uiAccess = new UIAccessFactory()();
        return new WeatherCLI($uiAccess);
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Application;

use Lokil\SolidWeatherApp\Domain\Model\WeatherData;

final class WeatherAPI
{

    public function getWeather(string $city): WeatherData
    {
        return new WeatherData($city, 'Leichter Regen', '19 Grad');
    }
}
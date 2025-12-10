<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Application\Port;

use Lokil\SolidWeatherApp\Domain\Model\WeatherData;

interface WeatherRequestPort
{
    /**
     * @param string $city
     * @return WeatherData
     * @throws \Exception
     */
    public function getWeatherForCity(string $city): WeatherData;
}
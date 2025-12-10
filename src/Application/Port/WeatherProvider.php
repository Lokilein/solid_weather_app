<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Application\Port;

use Lokil\SolidWeatherApp\Domain\Exception\WeatherNotFetchableException;
use Lokil\SolidWeatherApp\Domain\Model\WeatherData;

interface WeatherProvider
{
    /**
     * Fetches the relevant temperature data
     * @param string $city
     * @return WeatherData
     * @throws WeatherNotFetchableException
     */
    public function getWeatherForCity(string $city): WeatherData;
}
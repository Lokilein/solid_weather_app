<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Domain\Model;

final class WeatherData
{
    private string $city;
    private string $weather;
    private string $temperature;

    public function __construct(string $city, string $weather, string $temperature)
    {
        $this->city = $city;
        $this->weather = $weather;
        $this->temperature = $temperature;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getWeather(): string
    {
        return $this->weather;
    }

    public function getTemperature(): string
    {
        return $this->temperature;
    }


}
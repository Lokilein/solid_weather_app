<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Domain\Model;

final class WeatherData
{
    private string $city;
    private string $weather;
    private float $temperatureCelsius;

    public function __construct(string $city, string $weather, float $temperatureCelsius)
    {
        $this->city = $city;
        $this->weather = $weather;
        $this->temperatureCelsius = $temperatureCelsius;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getWeather(): string
    {
        return $this->weather;
    }

    public function getTemperatureCelsius(): float
    {
        return $this->temperatureCelsius;
    }


}
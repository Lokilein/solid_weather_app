<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Domain\Model;

final readonly class WeatherData
{
    public function __construct(private string $city, private string $weather, private float $temperatureCelsius)
    {
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
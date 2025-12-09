<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Application;

use Lokil\SolidWeatherApp\Domain\Model\WeatherData;

final class WeatherApp
{
    public function __construct(private readonly WeatherAPI $weatherAPI)
    {

    }

    public function getIntroduction(): string
    {
        return 'Von welcher Stadt soll das Wetter angezeigt werden?';
    }

    /**
     * @throws \Exception
     */
    public function getResult(string $city): string
    {
        $data = $this->weatherAPI->getWeather($city);
        return strtr(
            'Das Wetter in der Stadt %city: %weather. Es ist %temperature',
            [
                '%city' => $data->getCity(),
                '%weather' =>  $data->getWeather(),
                '%temperature' => $data->getTemperature()
            ]
        );
    }
}
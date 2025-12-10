<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Application;

use Lokil\SolidWeatherApp\Application\Port\WeatherProvider;

final readonly class GetCityWeatherUseCase
{
    public function __construct(private WeatherProvider $weatherAPI)
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
        $data = $this->weatherAPI->getWeatherForCity($city);
        return strtr(
            'Das Wetter in der Stadt %city: %weather. Es ist %temperature',
            [
                '%city' => $data->getCity(),
                '%weather' =>  $data->getWeather(),
                '%temperature' => number_format($data->getTemperatureCelsius(), 1, ',', '.') . '° Celsius',
            ]
        );
    }
}
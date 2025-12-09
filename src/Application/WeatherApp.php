<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Application;

final class WeatherApp
{

    public function getIntroduction(): string
    {
        return 'Von welcher Stadt soll das Wetter angezeigt werden?';
    }

    /**
     * @throws \Exception
     */
    public function getResult(string $city): string
    {
        return strtr(
            'Das Wetter in der Stadt %city: %weather. Es ist %temperature',
            [
                '%city' => $city,
                '%weather' => 'A',
                '%temperature' => 'B'
            ]
        );
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Domain\Weather\Adapter;

final class WeatherApp
{
    private ?string $city = null;

    public function getIntroduction(): string
    {
        return 'Von welcher Stadt soll das Wetter angezeigt werden?';
    }

    /**
     * @throws \Exception
     */
    public function setCity(string $city): void
    {
        if(empty($city)) {
            throw new \Exception('No valid city to set');
        }
        $this->city = $city;
    }

    /**
     * @throws \Exception
     */
    public function getResult(): string
    {
        if($this->city === null) {
            throw new \Exception('No city set');
        }

        $result = strtr(
            'Das Wetter in der Stadt %city: %weather. Es ist %temperature',
            [
                '%city' => $this->city,
                '%weather' => 'A',
                '%temperature' => 'B'
            ]
        );

        $this->city = null;
        return $result;
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Domain\Weather\Adapter;


use Lokil\SolidWeatherApp\Domain\Weather\Port\UIInterface;

final class WeatherApp
{
    public function __construct(private readonly UIInterface $ui)
    {

    }
    public function do(): void
    {
        $this->ui->writeNewLine('Von welcher Stadt soll das Wetter angezeigt werden?');
        $city = trim($this->ui->readInput());
        $output = strtr(
            'Das Wetter in der Stadt %city: %weather. Es ist %temperature',
            [
                '%city' => $city,
                '%weather' => 'A',
                '%temperature' => 'B'
            ]
        );
        $this->ui->writeNewLine($output);
    }
}
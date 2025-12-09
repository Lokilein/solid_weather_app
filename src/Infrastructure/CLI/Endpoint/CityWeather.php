<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint;

use Lokil\SolidWeatherApp\Application\WeatherApp;
use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\UserIOPort;

final readonly class CityWeather
{
    public function __construct(private UserIOPort $ui)
    {

    }

    public function run(): void
    {
        $weatherApp = new WeatherApp();
        $this->ui->writeNewLine($weatherApp->getIntroduction());
        $weatherApp->setCity($this->ui->readInput());
        $this->ui->writeNewLine($weatherApp->getResult());
    }
}
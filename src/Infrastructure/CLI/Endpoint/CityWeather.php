<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint;

use Lokil\SolidWeatherApp\Application\WeatherApp;
use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\UserIOPort;
use Lokil\SolidWeatherApp\Infrastructure\HTTP\WeatherAPIRequest;

final readonly class CityWeather
{
    public function __construct(private UserIOPort $ui)
    {

    }

    public function run(): void
    {
        $weatherApp = new WeatherApp(new WeatherAPIRequest());
        $this->ui->writeNewLine($weatherApp->getIntroduction());
        $this->ui->writeNewLine($weatherApp->getResult($this->ui->readInput()));
    }
}
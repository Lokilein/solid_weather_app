<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint;

use Lokil\SolidWeatherApp\Application\GetCityWeatherUseCase;
use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\UserIOPort;

final readonly class GetCityWeather
{
    public function __construct(private UserIOPort $ui, private GetCityWeatherUseCase $weatherApp)
    {

    }

    public function run(): void
    {
        $this->ui->writeNewLine($this->weatherApp->getIntroduction());
        $city = $this->ui->readInput();
        $this->ui->writeNewLine($this->weatherApp->getResult($city));
    }
}
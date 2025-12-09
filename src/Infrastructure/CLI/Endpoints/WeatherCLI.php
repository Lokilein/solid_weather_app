<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoints;

use Lokil\SolidWeatherApp\Domain\Weather\Adapter\WeatherApp;
use Lokil\SolidWeatherApp\Infrastructure\CLI\CLITools;

final class WeatherCLI
{
    public function __construct(private readonly CLITools $ui)
    {

    }
    public function do(): void
    {
        $weatherApp = new WeatherApp();
        $this->ui->writeNewLine($weatherApp->getIntroduction());
        $weatherApp->setCity($this->ui->readInput());
        $this->ui->writeNewLine($weatherApp->getResult());
    }
}
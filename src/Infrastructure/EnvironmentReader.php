<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure;

use Lokil\SolidWeatherApp\Domain\Exception\EnvironmentException;

final class EnvironmentReader
{
    public function getWeatherAPIKey(): string
    {
        $env = parse_ini_file(".env");
        if($env === false) {
            throw new EnvironmentException('Could not found .env file.');
        }
        if(!isset($env['WEATHER_API_KEY'])) {
            throw new EnvironmentException('Could not found value "WEATHER_API_KEY" in .env file.');
        }
        return $env['WEATHER_API_KEY'];
    }
}
<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint;

use Lokil\SolidWeatherApp\Application\GetCityWeatherUseCase;
use Lokil\SolidWeatherApp\Domain\Exception\DomainException;
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
        try{
            $result = $this->weatherApp->getResult($city);
        } catch (DomainException $e) {
           $result = $e->getMessage();
        }

        $this->ui->writeNewLine($result);
    }
}
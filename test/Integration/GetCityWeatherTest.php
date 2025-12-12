<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Test\Integration;

use Lokil\SolidWeatherApp\Application\GetCityWeatherUseCase;
use Lokil\SolidWeatherApp\Application\Port\WeatherProvider;
use Lokil\SolidWeatherApp\Domain\Model\WeatherData;
use Lokil\SolidWeatherApp\Infrastructure\CLI\Endpoint\GetCityWeather;
use Lokil\SolidWeatherApp\Infrastructure\CLI\IO\UserIOPort;
use PHPUnit\Framework\TestCase;

final class GetCityWeatherTest extends TestCase
{
    public function testSuccessful()
    {
        set_include_path(get_include_path() . PATH_SEPARATOR . '.\\..\\..');
        $ioPort = $this->createMock(UserIOPort::class);
        $ioPort->method('readInput')->willReturn('Berlin');
        $ioPort->method('writeNewLine')->willReturnCallback(function($text) {
            echo $text.PHP_EOL;
        });

        $mockWeather = new WeatherData('Berlin', 'Sonnig', 21.3);
        $weatherProvider = $this->createMock(WeatherProvider::class);
        $weatherProvider->method('getWeatherForCity')->with('Berlin')->willReturn($mockWeather);

        $class = new GetCityWeather(
            $ioPort,
            new GetCityWeatherUseCase($weatherProvider));
        ob_start();
        $class->run();
        $output = ob_get_clean();
        self::assertEquals('Von welcher Stadt soll das Wetter angezeigt werden?
Das Wetter in der Stadt Berlin: Sonnig. Es ist 21,3° Celsius
', $output);
    }
}
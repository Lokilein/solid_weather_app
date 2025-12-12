<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\HTTP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lokil\SolidWeatherApp\Application\Port\WeatherProvider;
use Lokil\SolidWeatherApp\Domain\Exception\EnvironmentException;
use Lokil\SolidWeatherApp\Domain\Exception\WeatherNotFetchableException;
use Lokil\SolidWeatherApp\Domain\Model\WeatherData;
use Lokil\SolidWeatherApp\Infrastructure\EnvironmentReader;
use Psr\Http\Message\ResponseInterface;

class WeatherAPIRequest implements WeatherProvider
{
    public function __construct(private readonly EnvironmentReader $environmentReader,
                                private readonly WeatherAPIParser $weatherAPIParser) {

    }

    /** @inheritDoc */
    public function getWeatherForCity(string $city): WeatherData
    {
        $res = $this->executeRequest($city);
        return $this->convertToModel($res, $city);
    }

    /**
     * @param string $city
     * @return ResponseInterface
     * @throws WeatherNotFetchableException
     * @throws EnvironmentException
     */
    private function executeRequest(string $city): ResponseInterface
    {
        $client = new Client();
        try {
            $res = $client->request(
                'GET',
                'http://api.weatherapi.com/v1/current.json?key=' . $this->environmentReader->getWeatherAPIKey() . '&q=' . $city . '&aqi=no' . '&lang=de'
            );
        } catch (GuzzleException $e) {
            error_log($e->getMessage());
            throw new WeatherNotFetchableException('Could not access weather of ' . $city, previous: $e);
        }
        return $res;
    }

    /**
     * @param ResponseInterface $res
     * @param string $city
     * @return WeatherData
     * @throws WeatherNotFetchableException
     */
    private function convertToModel(ResponseInterface $res, string $city): WeatherData
    {
        return new WeatherData(
            $city,
            $this->weatherAPIParser->parseWeatherDescription($res),
            $this->weatherAPIParser->parseTemperature($res),
        );
    }
}
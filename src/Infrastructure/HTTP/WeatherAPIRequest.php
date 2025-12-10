<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\HTTP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lokil\SolidWeatherApp\Application\Port\WeatherRequestPort;
use Lokil\SolidWeatherApp\Domain\Exception\WeatherNotFetchableException;
use Lokil\SolidWeatherApp\Domain\Model\WeatherData;
use Psr\Http\Message\ResponseInterface;

class WeatherAPIRequest implements WeatherRequestPort
{
    public function getWeatherForCity(string $city): WeatherData
    {
        $res = $this->executeRequest($city);
        if ($this->isAnswerValid($res)) {
            return $this->convertToModel($res, $city);
        }
        
        throw new WeatherNotFetchableException('Could not access weather of ' . $city . ': ' . $res->getStatusCode());
    }

    /**
     * @param string $city
     * @return ResponseInterface
     * @throws WeatherNotFetchableException
     */
    private function executeRequest(string $city): ResponseInterface
    {
        $env = parse_ini_file(".env");

        $client = new Client();
        try {
            $res = $client->request(
                'GET',
                'http://api.weatherapi.com/v1/current.json?key=' . $env['WEATHER_API_KEY'] . '&q=' . $city . '&aqi=no' . '&lang=de'
            );
        } catch (GuzzleException $e) {
            throw new WeatherNotFetchableException('Could not access weather of ' . $city, previous: $e);
        }
        return $res;
    }

    private function isAnswerValid(ResponseInterface $res): bool
    {
        return $res->getStatusCode() === 200
            && json_validate($res->getBody()->getContents());
    }

    /**
     * @param ResponseInterface $res
     * @param string $city
     * @return WeatherData
     */
    public function convertToModel(ResponseInterface $res, string $city): WeatherData
    {
        $jsonData = json_decode($res->getBody()->getContents(), true);
        return new WeatherData(
            $city,
            $jsonData['current']['condition']['text'],
            $jsonData['current']['temp_c']
        );
    }
}
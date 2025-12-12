<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\HTTP;

use Lokil\SolidWeatherApp\Domain\Exception\WeatherNotFetchableException;
use Psr\Http\Message\ResponseInterface;

final class WeatherAPIParser
{
    /**
     * @throws WeatherNotFetchableException
     */
    public function parseTemperature(ResponseInterface $response): float
    {
        if($this->isAnswerValid($response)) {
            $jsonData = json_decode($response->getBody()->getContents(), true);
            $response->getBody()->rewind();
            return $jsonData['current']['temp_c'];
        }
        throw new WeatherNotFetchableException('Could not parse temperature from weather data.');
    }

    /**
     * @throws WeatherNotFetchableException
     */
    public function parseWeatherDescription(ResponseInterface $response): string
    {
        if($this->isAnswerValid($response)) {
            $jsonData = json_decode($response->getBody()->getContents(), true);
            $response->getBody()->rewind();
            return $jsonData['current']['condition']['text'];
        }
        throw new WeatherNotFetchableException('Could not parse weather description from weather data.');
    }

    private function isAnswerValid(ResponseInterface $res): bool
    {
        $result = $res->getStatusCode() === 200
            && json_validate($res->getBody()->getContents());
        $res->getBody()->rewind();
        return $result;
    }
}
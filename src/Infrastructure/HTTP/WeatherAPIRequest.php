<?php
declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\HTTP;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lokil\SolidWeatherApp\Application\Port\WeatherRequestPort;
use Lokil\SolidWeatherApp\Domain\Model\WeatherData;

class WeatherAPIRequest implements WeatherRequestPort
{
    public function getWeatherForCity(string $city): WeatherData
    {
        $env = parse_ini_file(".env");

        $client = new Client();
        try {
            $res = $client->request('GET',
                'http://api.weatherapi.com/v1/current.json?key=' . $env['WEATHER_API_KEY'] .
                '&q=' . $city .
                '&aqi=no' .
                '&lang=de');
        } catch (GuzzleException $e) {
            throw new Exception('Could not access weather of '.$city, previous: $e);
        }

        if($res->getStatusCode() === 200) {
            $data = $res->getBody()->getContents();
            if(json_validate($data)) {
                $jsonData = json_decode($data, true);
                return new WeatherData($city,
                    $jsonData['current']['condition']['text'], $jsonData['current']['temp_c']);
            }
        }
        throw new Exception('Could not access weather of '.$city.': '.$res->getStatusCode());
    }
}
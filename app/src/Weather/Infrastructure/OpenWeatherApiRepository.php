<?php

declare(strict_types=1);

namespace App\Weather\Infrastructure;

use App\Shared\Infrastructure\ApiClient;
use App\Weather\Application\WeatherForCityQuery;
use App\Weather\Domain\WeatherForCity;

final class OpenWeatherApiRepository extends ApiWeatherRepository
{
    public function __construct(private ApiClient $client, private string $apiUrl, private string $apiKey)
    {}

    public function searchForCity(WeatherForCityQuery $query): WeatherForCity
    {
        $responseContent = $this->client($this->apiUrl, ['q' => $query->getCityName(), 'appid' => $this->apiKey]);

        return new WeatherForCity(
            $responseContent['name'],
            $responseContent['weather']['description'],
            (float) $responseContent['main']['temp']
        );
    }
}

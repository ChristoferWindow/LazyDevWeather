<?php

declare(strict_types=1);

namespace Weather\Infrastructure;

use Shared\Infrastructure\ApiClient;
use Weather\Application\WeatherForCityQuery;
use Weather\Domain\WeatherForCity;

final class OpenWeatherApiRepository extends ApiWeatherRepository
{
    public function __construct(private ApiClient $client, private string $apiUrl, private string $apiKey)
    {
        parent::__construct($this->client);
    }

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

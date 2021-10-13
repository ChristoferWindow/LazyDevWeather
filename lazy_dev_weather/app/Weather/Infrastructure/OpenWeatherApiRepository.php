<?php

declare(strict_types=1);

namespace App\Weather\Infrastructure;

use App\Shared\Infrastructure\ApiClient;
use App\Shared\Infrastructure\GuzzleClient\GuzzleApiClient;
use App\Weather\Application\Temperature;
use App\Weather\Application\WeatherForCityQuery;
use App\Weather\Domain\WeatherForCity;

final class OpenWeatherApiRepository extends ApiWeatherRepository
{
    public function __construct(private ApiClient $client, private string $apiUrl, private string $apiKey)
    {
        parent::__construct($this->client);
    }

    public function searchForCity(WeatherForCityQuery $query): WeatherForCity
    {
        $responseContent = $this->getClient()
            ->search(
                $this->apiUrl,
                [
                    'q' => $query->getCityName(),
                    'appid' => $this->apiKey,
                ]
            );

        return new WeatherForCity(
            $responseContent['name'],
            $responseContent['weather'][0]['description'],
            (float) $responseContent['main']['temp'] / 100
        );
    }


    private function getClient(): ApiClient
    {
        return $this->client;
    }
}

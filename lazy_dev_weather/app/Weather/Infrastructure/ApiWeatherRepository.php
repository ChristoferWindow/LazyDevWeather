<?php

declare(strict_types=1);

namespace App\Weather\Infrastructure;

use App\Shared\Infrastructure\ApiClient;
use App\Weather\Application\WeatherForCityQuery;
use App\Weather\Domain\WeatherForCity;
use App\Weather\Domain\WeatherRepository;

abstract class ApiWeatherRepository implements WeatherRepository
{
    public function __construct(private ApiClient $client)
    {}

    public abstract function searchForCity(WeatherForCityQuery $query): WeatherForCity;
}

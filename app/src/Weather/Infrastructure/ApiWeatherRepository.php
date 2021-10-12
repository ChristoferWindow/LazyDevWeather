<?php

declare(strict_types=1);

namespace Weather\Infrastructure;

use Shared\Infrastructure\ApiClient;
use Weather\Application\WeatherForCityQuery;
use Weather\Domain\WeatherForCity;
use Weather\Domain\WeatherRepository;

abstract class ApiWeatherRepository implements WeatherRepository
{
    public function __construct(private ApiClient $client) {}

    public abstract function searchForCity(WeatherForCityQuery $query): WeatherForCity;
}

<?php

declare(strict_types=1);

abstract class ApiWeatherRepository implements WeatherRepository
{
    public function __construct(private ApiClient $client) {}

    public abstract function searchForCity(WeatherForCityQuery $query): WeatherForCity;
}

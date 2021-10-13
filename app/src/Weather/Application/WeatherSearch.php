<?php

declare(strict_types=1);

namespace App\Weather\Application;

use App\Weather\Domain\WeatherRepository;

class WeatherSearch
{
    public function __construct(private WeatherRepository $repository){}

    public function searchForCity(string $cityName): string
    {
        $weather = $this->repository->searchForCity(new WeatherForCityQuery($cityName));

        return  "{$weather->getShortDescription()}, {$weather->getTemperature()} {$weather->getUnitNiceText()}";
    }
}

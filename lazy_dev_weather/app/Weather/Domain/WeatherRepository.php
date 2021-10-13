<?php

declare(strict_types=1);

namespace App\Weather\Domain;

use App\Weather\Application\WeatherForCityQuery;

interface WeatherRepository
{
    public function searchForCity(WeatherForCityQuery $query): WeatherForCity;
}

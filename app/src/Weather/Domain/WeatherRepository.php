<?php

declare(strict_types=1);

namespace Weather\Domain;

use Weather\Application\WeatherForCityQuery;

interface WeatherRepository
{
    public function searchForCity(WeatherForCityQuery $query): WeatherForCity;
}

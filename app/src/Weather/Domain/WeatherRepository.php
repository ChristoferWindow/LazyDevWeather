<?php

declare(strict_types=1);

interface WeatherRepository
{
    public function searchForCity(WeatherForCityQuery $query);
}

<?php

declare(strict_types=1);

namespace Weather\Application;

use Shared\Application\Query;

final class WeatherForCityQuery implements Query
{
    public function __construct(private string $cityName){}

    public function getCityName(): string
    {
        return $this->cityName;
    }

}

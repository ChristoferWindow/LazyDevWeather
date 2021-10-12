<?php

declare(strict_types=1);

final class WeatherForCityQuery implements Query
{
    public function __construct(private string $cityName){}

    public function getCityName(): string
    {
        return $this->cityName;
    }

}

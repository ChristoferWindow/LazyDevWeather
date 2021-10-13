<?php

declare(strict_types=1);

namespace Tests\Weather\Application\Unit;

use App\Weather\Application\WeatherForCityQuery;
use App\Weather\Domain\TemperatureUnits;
use App\Weather\Domain\WeatherForCity;
use App\Weather\Domain\WeatherRepository;

class WeatherTestJsonRepository implements WeatherRepository
{
    private function repositoryData()
    {
        return [
            'Berlin' => [
                'cityName' => 'Berlin',
                'shortDescription' => 'partially sunny',
                'temperature' => 23.555,
            ],
            'Gdańsk' => [
                'cityName' => 'Gdańsk',
                'shortDescription' => 'cloudy but good',
                'temperature' => 1.33,
            ],
            'Shanghai' => [
                'cityName' => 'Shanghai',
                'shortDescription' => 'cloudy but good',
                'temperature' => 17.1,
            ],
            'Los Angeles' => [
                'cityName' => 'Los Angeles',
                'shortDescription' => 'sunny',
                'temperature' => 2.22,
                'unit' => TemperatureUnits::UNIT_FAHRENHEIT_DEGREES
            ]
        ];
    }

    public function searchForCity(WeatherForCityQuery $query): ?WeatherForCity
    {
        $repository = $this->repositoryData();
        $cityName = $query->getCityName();
        $isFound = array_key_exists($query->getCityName(), $this->repositoryData());
        $result = $repository[$cityName];

        return $isFound ? new WeatherForCity(...$result) : null;
    }
}

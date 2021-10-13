<?php

declare(strict_types=1);

namespace App\Weather\Application;

use App\Weather\Domain\WeatherRepository;

class WeatherSearch
{
    public function __construct(private WeatherRepository $repository)
    {
    }

    public function searchForCity(string $cityName): string
    {
        $weather = $this->repository->searchForCity(new WeatherForCityQuery($cityName));

        if ($weather === null) {
            return "No weather found for $cityName";
        }

        $temperature = (new Temperature($weather->getTemperature()))->getFormattedDecimalPlaces(2);

        /** TODO: move to Presenter specific for presentation layer */
        return ucfirst("{$weather->getShortDescription()}, {$temperature} {$weather->getUnitNiceText()}");
    }
}

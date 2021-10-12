<?php

declare(strict_types=1);


class WeatherForCity
{
    public function __construct(
        private string $cityName,
        private string $shortDescription,
        private float $temperature,
        private string $unit = TemperatureUnits::UNIT_CELCIUS_DEGREES
    ) {
    }

    public function getCityName(): string
    {
        return $this->cityName;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getUnitNiceText(): string
    {
        return TemperatureUnits::UNITS_NICE_TEXT[$this->getUnit()];
    }

}

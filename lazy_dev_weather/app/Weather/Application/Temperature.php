<?php

declare(strict_types=1);

namespace App\Weather\Application;

class Temperature
{
    public function __construct(private float $temperature)
    {}

    public function getFormattedDecimalPlaces(int $places): string
    {
        return number_format($this->getTemperature(), 2);
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }


}

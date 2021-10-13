<?php

declare(strict_types=1);

namespace App\Weather\Domain;

final class TemperatureUnits
{
    public const UNIT_CELCIUS_DEGREES = 'celcius';

    public const UNITS_NICE_TEXT = [
        self::UNIT_CELCIUS_DEGREES => 'Degrees celcius',
    ];
}

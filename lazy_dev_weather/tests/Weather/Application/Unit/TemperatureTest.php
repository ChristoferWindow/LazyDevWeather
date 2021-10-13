<?php

declare(strict_types=1);

namespace Tests\Weather\Application\Unit;

use App\Weather\Application\Temperature;
use PHPUnit\Framework\TestCase;

class TemperatureTest extends TestCase
{
    /**
     * @dataProvider providerTemperature
     */
    public function testItReturnsStringWithTwodDecimalPlaces(float $data, string $expected)
    {
        $temperature = new Temperature($data);
        $actual = $temperature->getFormattedDecimalPlaces(2);

        self::assertEquals($expected, $actual);
    }

    public function providerTemperature() {
        return [
            /** number_format rounds up */
            [
                12.3460,
                '12.35'
            ],
            [
                1.6,
                '1.60'
            ],
            [
                12.3436,
                '12.34'
            ],
            [
                1.34,
                '1.34'
            ],
            [
                1.3,
                '1.30'
            ]
        ];
    }
}

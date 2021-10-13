<?php

declare(strict_types=1);

namespace Tests\Weather\Application\Unit;

use App\Weather\Application\WeatherSearch;
use PHPUnit\Framework\TestCase;

class WeatherSearchTest extends TestCase
{
    private WeatherSearch $stub;

    public function setUp(): void
    {
        parent::setUp();
        $this->stub = new WeatherSearch(new WeatherTestArrayRepository());
    }

    /**
     * @dataProvider providerWeatherForCity
     */
    public function testReturnsFormattedTextForCity(array $data, string $expected)
    {
        $resposne = $this->stub->searchForCity($data['city']);
        self::assertEquals($expected, $resposne);
    }

    public function providerWeatherForCity()
    {
        return [
            [
                'data' => [
                    'city' => 'Berlin',
                ],
                'result' => 'Partially sunny, 23.56 Degrees celcius',
            ],
            [
                'data' => [
                    'city' => 'Gdańsk',
                ],
                'result' => 'Cloudy but good, 1.33 Degrees celcius',
            ],
            [
                'data' => [
                    'city' => 'Shanghai',
                ],
                'result' => 'Cloudy but good, 17.10 Degrees celcius',
            ],
            [
                'data' => [
                    'city' => 'Los Angeles'
                ],
                'result' => 'Sunny, 2.22 Degrees fahrenheit'
            ]
        ];
    }
}

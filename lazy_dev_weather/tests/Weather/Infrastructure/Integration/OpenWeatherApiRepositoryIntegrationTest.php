<?php

declare(strict_types=1);

namespace Tests\Weather\Infrastructure\Integration;

use App\Shared\Infrastructure\GuzzleClient\GuzzleApiClient;
use App\Weather\Application\WeatherForCityQuery;
use App\Weather\Domain\WeatherForCity;
use App\Weather\Infrastructure\OpenWeatherApiRepository;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

class OpenWeatherApiRepositoryIntegrationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $dotenv = new Dotenv();
        $dotenv->load(dirname(__DIR__, 4) . '/.env');
    }

    /**
     * @dataProvider providerIncorrectCities
     */
    public function testReturnsNullWhenCityNotFoundInApi(string $city)
    {
        $apiRepository = new OpenWeatherApiRepository(
            new GuzzleApiClient(new Client()),
            $_ENV['OPEN_WEATHER_API_URL'],
            $_ENV['OPEN_WEATHER_API_KEY']
        );

        $result = $apiRepository->searchForCity(new WeatherForCityQuery($city)) ?? null;

        self::assertNull(
            $result
        );
    }

    /**
     * @dataProvider providerCorrectCities
     */
    public function testBuildsWeatherForCityFromApi(string $city)
    {
        $apiRepository = new OpenWeatherApiRepository(
            new GuzzleApiClient(new Client()),
            $_ENV['OPEN_WEATHER_API_URL'],
            $_ENV['OPEN_WEATHER_API_KEY']
        );

        $result = get_class($apiRepository->searchForCity(new WeatherForCityQuery($city))) ?? null;

        self::assertEquals(
            WeatherForCity::class,
            $result
        );
    }

    public function providerCorrectCities()
    {
        return
            [
                ['Gdansk'],
                ['Los angeles'],
            ];
    }

    public function providerIncorrectCities()
    {
        return
            [
                ['asdfje'],
                ['Los angels'],
            ];
    }
}

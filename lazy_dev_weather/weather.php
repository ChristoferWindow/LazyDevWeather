<?php

declare(strict_types=1);

use App\Shared\Infrastructure\GuzzleClient\GuzzleApiClient;
use App\Weather\Application\WeatherSearch;
use App\Weather\Infrastructure\OpenWeatherApiRepository;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Dotenv\Dotenv;

set_exception_handler('exceptionHandler');

require 'vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

/**
 * Position in argv array, omitting file name at 0 index
 */
$index = 0;
$arguments = $argv;
$argumentsCount = $argc;

/**
 * Removing file name from arguments array
 */
array_shift($arguments);

$query = new WeatherSearch(
    new OpenWeatherApiRepository(
        new GuzzleApiClient(new GuzzleHttp\Client()),
        $_ENV['OPEN_WEATHER_API_URL'],
        $_ENV['OPEN_WEATHER_API_KEY']
    )
);

echo PHP_EOL . ucfirst($query->searchForCity($arguments[0])) . PHP_EOL;

function exceptionHandler($exception): void
{
    var_dump($exception);
    die;
}


<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Weather\Application\WeatherSearch;
use Weather\Infrastructure\OpenWeatherApiRepository;

set_exception_handler('exceptionHandler');

require '../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator('../config/symfony'));
$loader->load('services.yaml');

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
$weatherSearch = new WeatherSearch(new OpenWeatherApiRepository(new \Shared\Infrastructure\Guzzle\GuzzleApiClient(new \GuzzleHttp\Client()), 'api.openweathermap.org/data/2.5/weather','c0f764ce5e4c25576b8d6325fc223810'));
print ($weatherSearch->searchForCity($arguments[0]));

function exceptionHandler($exception): void
{
    print($exception->getMessage());
    die;
}


<?php

declare(strict_types=1);

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

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

$app = new Application();
$app->add(new \App\Console\WeatherCommand('Weather'));
$app->run();

function exceptionHandler($exception): void
{
    print($exception->getMessage());
    die;
}


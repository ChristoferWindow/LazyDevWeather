<?php

declare(strict_types=1);

set_exception_handler('exceptionHandler');

require 'app/vendor/autoload.php';

//spl_autoload_register(
//    function ($className) {
//        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
//        include_once __DIR__  . $className . '.php';
//    }
//);

//use GuzzleHttp\Client;
//use VersionControl\VersionControlAdapterFactory;


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

function exceptionHandler($exception): void
{
    print($exception->getMessage());
    die;
}


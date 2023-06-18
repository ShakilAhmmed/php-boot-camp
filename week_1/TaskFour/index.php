<?php


include __DIR__ . "/vendor/autoload.php";

use Shakil\TaskFour\Commands\ConsoleSum;
use Symfony\Component\Console\Application;

$app = new Application("Console Application", "1.0.0");

try {
    $app->add(new ConsoleSum());
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}

// To run : php index.php sum 10 20
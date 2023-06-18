<?php


$fileName = $argv[0];

echo "You are running {$fileName}" . PHP_EOL;

$restArgs = array_slice($argv, 1);

foreach ($restArgs as $key => $arg) {
    echo "{$key} : {$arg}" . PHP_EOL;
}

//  To run this script php taskThree.php hello world
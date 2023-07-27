<?php

use Shakil\Day5\Conversion;

require __DIR__ . "/vendor/autoload.php";

$task = new Conversion();
$infix = readline("Enter Infix :\n");
$task->infixToPostfix($infix);

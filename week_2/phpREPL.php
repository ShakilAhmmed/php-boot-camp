<?php

$instructions = "";

while (true) {
    $input = readline("php > ");
    if ($input === "exit") {
        break;
    }

    if (!str_contains($input, ';')) {
        $instructions .= $input . PHP_EOL;
        continue;
    }
    $instructions .= $input;
    eval($instructions);
    echo PHP_EOL;
    $code = '';
}

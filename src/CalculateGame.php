<?php

namespace BrainGames\CalculateGame;

use BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function mines($firstNumber, $secondNumber){
    line("$firstNumber - $secondNumber");
    return $firstNumber - $secondNumber;
}

function plus($firstNumber, $secondNumber){
    line("$firstNumber + $secondNumber");
    return $firstNumber + $secondNumber;
}

function multiply($firstNumber, $secondNumber){
    line("$firstNumber * $secondNumber");
    return $firstNumber * $secondNumber;
}

function CalculateGame()
{
    $firstNumber = rand(0, 20);
    $secondNumber = rand(0, 20);
    $symbols = [
        1 => mines($firstNumber, $secondNumber),
        2 => plus($firstNumber, $secondNumber),
        3 => multiply($firstNumber, $secondNumber)
    ];
    $name = Cli\askName();
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $symbolNumber = rand(1, 3);
        print_r($symbols[$symbolNumber]);
    }
}

CalculateGame();
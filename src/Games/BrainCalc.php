<?php

namespace BrainGames\Games\BrainCalc;

use BrainGames\Engine;

const MAX_POSSIBLE_GNERATED_NUMBER = 20;

function calculate(int $firstNumber,int $secondNumber,int $symbolNumber): int{
    $result = 0;
    switch ($symbolNumber) {
        case 0:
            $result = $firstNumber + $secondNumber;
            break;
        case 1:
            $result = $firstNumber - $secondNumber;
            break;
        case 2:
            $result = $firstNumber * $secondNumber;
            break;
    }
    return $result;
}

function brainCalc(): void
{
    $message = 'What is the result of the expression?';
    $questionsAndAnswers = [];

    $symbols = [
        '+',
        '-',
        '*'
    ];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(Engine\EVERY_GAME_MIN_NUMBER, MAX_POSSIBLE_GNERATED_NUMBER);
        $secondNumber = rand(Engine\EVERY_GAME_MIN_NUMBER, MAX_POSSIBLE_GNERATED_NUMBER);
        $symbolNumber = array_rand($symbols);
        $questionsAndAnswers[$i] = ["question" => "{$firstNumber} {$symbols[$symbolNumber]} {$secondNumber}", "answer" => calculate($firstNumber, $secondNumber, $symbolNumber)];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

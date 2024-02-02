<?php

namespace BrainGames\Games\BrainGcd;

use BrainGames\Engine;

function getMaxDivider(int $firstNumber, int $secondNumber): int
{
    $maxDivider = 0;

    if ($firstNumber >= $secondNumber) {
        $max = $firstNumber;
    } else {
        $max = $secondNumber;
    }

    for ($i = 1; $i <= $max; $i++) {
        if ($firstNumber % $i === 0 and $secondNumber % $i === 0) {
            $maxDivider = $i;
        }
    }
    return $maxDivider;
}

function brainGcd()
{
    $message = "Find the greatest common divisor of given numbers.";
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(1, 25);
        $secondNumber = rand(1, 25);
        $questions[$i] = "{$firstNumber} {$secondNumber}";
        $correctAnswers[$i] = getMaxDivider($firstNumber, $secondNumber);
    }
    Engine\game($message, $questions, $correctAnswers);
}

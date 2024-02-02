<?php

namespace BrainGames\Games\BrainGcd;

use BrainGames\Engine;

function getMaxDivisior(int $firstNumber, int $secondNumber): int
{
    $maxDivisior = 0;

    if ($firstNumber >= $secondNumber) {
        $max = $firstNumber;
    } else {
        $max = $secondNumber;
    }

    for ($i = 1; $i <= $max; $i++) {
        if ($firstNumber % $i === 0 and $secondNumber % $i === 0) {
            $maxDivisior = $i;
        }
    }
    return $maxDivisior;
}

function brainGcd()
{
    $massege = "Find the greatest common divisor of given numbers.";
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(1, 25);
        $secondNumber = rand(1, 25);
        $questions[$i] = "{$firstNumber} {$secondNumber}";
        $correctAnswers[$i] = getMaxDivisior($firstNumber, $secondNumber);
    }
    Engine\game($massege, $questions, $correctAnswers);
}

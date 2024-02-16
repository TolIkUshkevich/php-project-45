<?php

namespace BrainGames\Games\BrainGcd;

use BrainGames\Engine;

const MAX_POSSIBLE_GNERATED_NUMBER = 25;

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

function brainGcd(): void
{
    $message = "Find the greatest common divisor of given numbers.";
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(Engine\EVERY_GAME_MIN_NUMBER, MAX_POSSIBLE_GNERATED_NUMBER);
        $secondNumber = rand(Engine\EVERY_GAME_MIN_NUMBER, MAX_POSSIBLE_GNERATED_NUMBER);
        $questions[$i] = "{$firstNumber} {$secondNumber}";
        $correctAnswers[$i] = getMaxDivider($firstNumber, $secondNumber);
    }
    Engine\runGame($message, $questions, $correctAnswers);
}

<?php

namespace BrainGames\Games\BrainGcd;

use BrainGames\Engine;

const MAX_POSSIBLE_GENERATED_NUMBER = 25;

function getMaxDivider(int $firstNumber, int $secondNumber): int
{
    $maxDivider = 0;

    $max = $firstNumber >= $secondNumber ? $firstNumber : $secondNumber;

    for ($i = 1; $i <= $max; $i++) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            $maxDivider = $i;
        }
    }
    return $maxDivider;
}

function brainGcd(): void
{
    $message = 'Find the greatest common divisor of given numbers.';
    $questionsAndAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(Engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $secondNumber = rand(Engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $questionsAndAnswers[$i] = [
            "question" => sprintf("%s %s", $firstNumber, $secondNumber),
            'answer' => sprintf("%s", getMaxDivider($firstNumber, $secondNumber))];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

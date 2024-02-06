<?php

namespace BrainGames\Games\BrainEven;

use BrainGames\Engine;

function checkIfEven(int $number): bool
{
    return $number % 2 === 0;
}

function brainEven(): null
{
    $message = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $number = rand(0, 100);
        $questions[$i] = $number;
        $correctAnswers[$i] = checkIfEven($number) ? 'yes' : 'no';
    }
    Engine\game($message, $questions, $correctAnswers);
    return null;
}

<?php

namespace BrainGames\Games\BrainEven;

use BrainGames\Engine;

const MAX_POSSIBLE_GNERATED_NUMBER = 100;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function brainEven(): void
{
    $message = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionsAndAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $number = rand(Engine\EVERY_GAME_MIN_NUMBER, MAX_POSSIBLE_GNERATED_NUMBER);
        $questionsAndAnswers[$i] = ["question" => $number, "answer" => isEven($number) ? 'yes' : 'no'];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

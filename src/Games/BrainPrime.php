<?php

namespace BrainGames\Games\BrainPrime;

use BrainGames\Engine;

function getPrimeNumbers(int $inputNumber): array
{
    $primeMassive = [2];
    $counter = 0;
    for ($i = 3; $i <= $inputNumber; $i++) {
        for ($j = 2; $j <= 100; $j++) {
            if ($i % $j === 0) {
                $counter++;
            }
        }
        if ($counter === 1) {
            $primeMassive[] = $i;
        }
        $counter = 0;
    }
    return $primeMassive;
}

function brainPrime()
{
    $massage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    $primeMassive = getPrimeNumbers(100);
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $number = rand(0, 100);
        $questions[$i] = $number;
        $correctAnswers[$i] = in_array($number, $primeMassive, true) ? 'yes' : 'no';
    }
    Engine\game($massage, $questions, $correctAnswers);
}

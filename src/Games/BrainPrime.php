<?php

namespace BrainGames\Games\BrainPrime;

use BrainGames\Engine;

const FIRST_PRIME_NUMBER = 2;
function ifNumberIsPrime(int $inputNumber): bool
{
    $arrayOfPrimeNumbers = [FIRST_PRIME_NUMBER];
    $counter = 0;
    for ($i = FIRST_PRIME_NUMBER; $i <= $inputNumber; $i++) {
        for ($j = FIRST_PRIME_NUMBER; $j <= 100; $j++) {
            if ($i % $j === 0) {
                $counter++;
            }
        }
        if ($counter === 1) {
            $arrayOfPrimeNumbers[] = $i;
        }
        $counter = 0;
    }
    return in_array($inputNumber, $arrayOfPrimeNumbers, true);
}

function brainPrime(): null
{
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $number = rand(FIRST_PRIME_NUMBER, 100);
        $questions[$i] = $number;
        $correctAnswers[$i] = ifNumberIsPrime($number) ? 'yes' : 'no';
    }
    Engine\game($message, $questions, $correctAnswers);
    return null;
}

<?php

namespace BrainGames\Games\BrainPrime;

use BrainGames\Engine;

const FIRST_PRIME_NUMBER = 2;
const MAX_POSSIBLE_GENERATED_NUMBER = 100;

function isPrime(int $inputNumber): bool
{
    $arrayOfPrimeNumbers = [FIRST_PRIME_NUMBER];
    $counter = 0;
    for ($i = FIRST_PRIME_NUMBER; $i <= $inputNumber; $i++) {
        for ($j = FIRST_PRIME_NUMBER; $j <= MAX_POSSIBLE_GENERATED_NUMBER; $j++) {
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

function brainPrime(): void
{
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionsAndAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $number = rand(FIRST_PRIME_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $questionsAndAnswers[$i] = ["question" => $number, "answer" => isPrime($number) ? 'yes' : 'no'];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

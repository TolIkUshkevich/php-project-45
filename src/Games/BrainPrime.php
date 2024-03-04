<?php

namespace BrainGames\Games\BrainPrime;

use BrainGames\Engine;

const FIRST_PRIME_NUMBER = 2;
const MAX_POSSIBLE_GENERATED_NUMBER = 100;

/**
 * @return array<int> $arrayOfNumbers
 */
function getArrayOfPrimeNumbers(): array
{
    $arrayOfNumbers = range(FIRST_PRIME_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
    $counterOfNumbers = 0;
    while (array_key_exists($counterOfNumbers, $arrayOfNumbers)) {
        $divider = $arrayOfNumbers[$counterOfNumbers];
        foreach ($arrayOfNumbers as $number) {
            if ($number % $divider === 0 && $number !== $divider) {
                unset($arrayOfNumbers[array_search($number, $arrayOfNumbers, true)]);
                $arrayOfNumbers = array_values($arrayOfNumbers);
            }
        }
        $counterOfNumbers++;
    }
    return $arrayOfNumbers;
}

function brainPrime(): void
{
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionsAndAnswers = [];
    $primeNumbers = getArrayOfPrimeNumbers();
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $number = rand(FIRST_PRIME_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $questionsAndAnswers[$i] = [
            "question" => sprintf("%s", $number),
            "answer" => in_array($number, $primeNumbers, true) ? "yes" : "no"];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

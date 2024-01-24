<?php

namespace BrainGames\Engine;

use function Cli\line;
use function Cli\prompt;

const GAMEROUNDSNUMBER = 3;
const FIRSTROUNDNUMBER = 1;

function checkIfEven(int $number): bool
{
    return $number % 2 === 0;
}

function GetPrimeNumbers(int $inputNumber): array
{
    $primeMassive = [2];
    $counter = 0;
    for ($i = 3; $i <= $inputNumber; $i++) {
        for ($j = 2; $j <= 100; $j++) {
            if ($i % $j == 0) {
                $counter++;
            }
        }
        if ($counter == 1) {
            $primeMassive[] = $i;
        }
        $counter = 0;
    }
    return $primeMassive;
}

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

function game(string $massage,array $questions,array $correctAnswers)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    line($massage);
    for ($i = 0; $i < GAMEROUNDSNUMBER; $i++) {
        $question = $questions[$i];
        line("Question: {$question}");
        $answer = prompt('Your answer');
        $correctAnswer = $correctAnswers[$i];
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }

        line("Correct!");
        if ($i === 2) {
            line("Congratulations, %s!", $name);
        }
    }
}

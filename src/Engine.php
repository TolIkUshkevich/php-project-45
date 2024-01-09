<?php

namespace BrainGames\Engine;

use function Cli\line;
use function Cli\prompt;

function checkIfEven($number): bool
{
    return $number % 2 === 0;
}

function CheckIfSimple($inputNumber)
{
    $total_divisors = 0;
    for ($i = 1; $i <= $inputNumber; $i++) {
        if ($inputNumber % $i == 0) {
            $total_divisors++;
        }
    }
    return $total_divisors == 2 ? true : false;
}

function game($massage, $questions, $correctAnswers)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    return $name;
    line($massage);
    for ($i = 0; $i < 3; $i++) {
        $question = $questions[$i];
        line("Question: {$question}");
        $answer = prompt('Your answer');
        $correctAnswer = $correctAnswers[$i];
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s", $name);
            break;
        }

        line("Correct!");
        if ($i === 2) {
            line("Congratulations, %s!", $name);
        }
    }
}

<?php

namespace BrainGames\CheckGame;

use BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function checkIfEven($number)
{
    return $number % 2 == 0 ? 'yes' : 'no';
}

function checkNumberGame()
{
    $name = Cli\askName();
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 100);
        line("Question: {$number}");
        $correctAnswer = checkIfEven($number);
        $answer = prompt('Your answer');
        if ($answer != $correctAnswer) {
            line("\"{$answer}\" is wrong answer ;(. Correct answer was \"{$correctAnswer}\".");
            line("Let's try again, {$name}");
            break;
        }
        else {
            line("Correct!");
            if ($i == 2){
                line("Congratulations, {$name}!");
            }
            continue;
        }
    }
}

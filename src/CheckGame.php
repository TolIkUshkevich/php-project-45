<?php

namespace BrainGames\CheckGame;

use function cli\line;
use function cli\prompt;
use BrainGames\Cli;

function checkIfEven($number)
{
    return $number % 2 == 0 ? 'yes' : 'no';
}

function checkNumberGame()
{
    $name = Cli\askName();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $number = 15;
    line("Question: {$number}");
    $correctAnswer = checkIfEven($number);
    $answer = prompt('Your answer: ');
    if ($answer != $correctAnswer){
        line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
        line("Let's try again, {$name}");
    }
    else{
        line("Correct!");
    }
}
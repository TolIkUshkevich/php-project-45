<?php

namespace BrainGames\CalculateGame;

use BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function CalculateGame()
{
    $name = Cli\askName();
    line('What is the result of the expression?');
    $symbolNumber = 0;
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(0, 20);
        $secondNumber = rand(0, 20);
        $symbols = [
            "{$firstNumber} - {$secondNumber}",
            "{$firstNumber} + {$secondNumber}",
            "{$firstNumber} * {$secondNumber}"
        ];
        $answeres = [
            $firstNumber - $secondNumber,
            $firstNumber + $secondNumber,
            $firstNumber * $secondNumber
        ];
        print_r("Question: " . $symbols[$symbolNumber] . "\n");
        $answer = prompt("Your answer");
        $correctAnswer = $answeres[$symbolNumber];
        if ($answer != $correctAnswer) {
            line("\"{$answer}\" is wrong answer ;(. Correct answer was \"{$correctAnswer}\".");
            line("Let's try again, {$name}");
            break;
        }
        else {
            line("Correct!");
            $symbolNumber++;
            if ($i == 2){
                line("Congratulations, {$name}!");
            }
            continue;
        }
    }
}
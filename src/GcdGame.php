<?php

namespace Braingames\GcdGame;

use function cli\line;
use function cli\prompt;
use BrainGames\Cli;

function gcdGame(){
    $name = Cli\askName();
    line("Find the greatest common divisor of given numbers.");
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 25);
        $secondNumber = rand(1, 25);
        line("Question: {$firstNumber} {$secondNumber}");
        $correctAnswer = gmp_gcd($firstNumber, $secondNumber);
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer){
            line("Correct!");
            if ($i == 2){
                line("Congratulations, {$name}!");
            }
        }
        else{
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, Sam!");
            break;
        }
    }
}
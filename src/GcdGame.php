<?php

namespace Braingames\GcdGame;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function gcdGame(){
    $name = Cli\askName();
    line("Find the greatest common divisor of given numbers.");
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 25);
        $secondNumber = rand(1, 25);
        line("Question: {$firstNumber} {$secondNumber}");
        $correctAnswer = gmp_gcd($firstNumber, $secondNumber);
        $answer = prompt("Your answer");
        if ($answer !== $correctAnswer){
            Engine\printWrongAnswer($answer, $correctAnswer);
            line("Let's try again, {$name}!");
            break;
        }

        line("Correct!");
        if ($i == 2){
            line("Congratulations, {$name}!");
        }
    }
}
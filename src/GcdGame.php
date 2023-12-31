<?php

namespace Braingames\GcdGame;

use BrainGames\Cli;
use BrainGames\Engine;
use Random\Engine as RandomEngine;

use function cli\line;
use function cli\prompt;

function gcdGame()
{
    $massege = "Find the greatest common divisor of given numbers.";
    $questions = [];
    $correctAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 25);
        $secondNumber = rand(1, 25);
        $questions[] = "{$firstNumber} {$secondNumber}";
        $correctAnswers[] = gmp_gcd($firstNumber, $secondNumber);
    }
    Engine\game($massege, $questions, $correctAnswers);
}

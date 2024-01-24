<?php

namespace Braingames\GcdGame;

use BrainGames\Engine;

function gcdGame()
{
    $massege = "Find the greatest common divisor of given numbers.";
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRSTROUNDNUMBER; $i <= Engine\GAMEROUNDSNUMBER; $i++) {
        $firstNumber = rand(1, 25);
        $secondNumber = rand(1, 25);
        $questions[$i] = "{$firstNumber} {$secondNumber}";
        $correctAnswers[$i] = Engine\getMaxDivisior($firstNumber, $secondNumber);
    }
    Engine\game($massege, $questions, $correctAnswers);
}

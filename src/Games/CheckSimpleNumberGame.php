<?php

namespace BrainGames\SimpleNumberGame;

use BrainGames\Engine;
use Random\Engine as RandomEngine;

use function BrainGames\Engine\GetPrimeNumbers;
use function cli\line;
use function cli\prompt;

function CheckSimpleNumberGame()
{
    $massage = 'Answer "yes" if the number is prime. Otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    $primeMassive = Engine\GetPrimeNumbers(100);
    for ($i = 1; $i <= 3; $i++) {
        $number = rand(0, 100);
        $questions[] = $number;
        $correctAnswers[] = in_array($number, $primeMassive) ? 'yes' : 'no';
    }
    Engine\Game($massage, $questions, $correctAnswers);
}

<?php

namespace BrainGames\SimpleNumberGame;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function CheckSimpleNumberGame()
{
    $massage = 'Answer "yes" if the number is prime, otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    for ($i = 1; $i <= 3; $i++) {
        $number = rand(0, 100);
        $questions[] = $number;
        $correctAnswers[] = Engine\checkIfSimple($number) ? 'yes' : 'no';
    }
    Engine\Game($massage, $questions, $correctAnswers);
}

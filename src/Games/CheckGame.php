<?php

namespace BrainGames\Games\CheckGame;

use BrainGames\Engine;

function checkNumberGame()
{
    $massage = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRSTROUNDNUMBER; $i <= Engine\GAMEROUNDSNUMBER; $i++) {
        $number = rand(0, 100);
        $questions[] = $number;
        $correctAnswers[] = Engine\checkIfEven($number) ? 'yes' : 'no';
    }
    Engine\Game($massage, $questions, $correctAnswers);
}

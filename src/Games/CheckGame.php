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
        $questions[$i] = $number;
        $correctAnswers[$i] = Engine\checkIfEven($number) ? 'yes' : 'no';
    }
    Engine\game($massage, $questions, $correctAnswers);
}

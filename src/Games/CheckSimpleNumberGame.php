<?php

namespace BrainGames\SimpleNumberGame;

use BrainGames\Engine;

function CheckSimpleNumberGame()
{
    $massage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = [];
    $correctAnswers = [];
    $primeMassive = Engine\getPrimeNumbers(100);
    for ($i = Engine\FIRSTROUNDNUMBER; $i <= Engine\GAMEROUNDSNUMBER; $i++) {
        $number = rand(0, 100);
        $questions[$i] = $number;
        $correctAnswers[$i] = in_array($number, $primeMassive, true) ? 'yes' : 'no';
    }
    Engine\game($massage, $questions, $correctAnswers);
}

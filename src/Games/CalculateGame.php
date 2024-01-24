<?php

namespace BrainGames\CalculateGame;

use BrainGames\Cli;
use BrainGames\Engine;
use Random\Engine as RandomEngine;

use function cli\line;
use function cli\prompt;

function CalculateGame()
{
    $massage = 'What is the result of the expression?';
    $questions = [];
    $correctAnswers = [];
    $symbols = [
        1 => '+',
        2 => '-',
        3 => '*'
    ];
    for ($i = Engine\FIRSTROUNDNUMBER; $i <= Engine\GAMEROUNDSNUMBER; $i++) {
        $firstNumber = rand(1, 20);
        $secondNumber = rand(1, 20);
        $questions[$i] = "{$firstNumber} {$symbols[$i]} {$secondNumber}";
        $correctAnswers[$i] = eval('return ' . $questions[$i] . ';');
    }
    Engine\Game($massage, $questions, $correctAnswers);
}

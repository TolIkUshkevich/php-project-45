<?php

namespace BrainGames\CalculateGame;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function CalculateGame()
{
    $massage = 'What is the result of the expression?';
    $questions = [];
    $correctAnswers = [];
    $symbols = [
        '+',
        '-',
        '*'
    ];
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 20);
        $secondNumber = rand(1, 20);
        $questions[] = "{$firstNumber} {$symbols[$i]} {$secondNumber}";
        $correctAnswers[] = eval('return ' . $questions[$i] . ';');
    }
    Engine\Game($massage, $questions, $correctAnswers);
}
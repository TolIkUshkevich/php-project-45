<?php

namespace BrainGames\Games\BrainCalc;

use BrainGames\Engine;

function brainCalc()
{
    $massage = 'What is the result of the expression?';
    $questions = [];
    $correctAnswers = [];
    $symbols = [
        1 => '+',
        2 => '-',
        3 => '*'
    ];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(1, 20);
        $secondNumber = rand(1, 20);
        $symbolNumber = array_rand($symbols, 1);
        $questions[$i] = "{$firstNumber} {$symbols[$symbolNumber]} {$secondNumber}";
        switch ($symbolNumber) {
            case 1:
                $correctAnswers[$i] = $firstNumber + $secondNumber;
                break;
            case 2:
                $correctAnswers[$i] = $firstNumber - $secondNumber;
                break;
            case 3:
                $correctAnswers[$i] = $firstNumber * $secondNumber;
                break;
        }
        unset($symbols[$symbolNumber]);
    }
    Engine\game($massage, $questions, $correctAnswers);
}

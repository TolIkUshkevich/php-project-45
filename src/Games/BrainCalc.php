<?php

namespace BrainGames\Games\BrainCalc;

use BrainGames\Engine;

function brainCalc(): void
{
    $message = 'What is the result of the expression?';
    $questions = [];
    $correctAnswers = [];

    $symbols = [
        '+',
        '-',
        '*'
    ];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(1, 20);
        $secondNumber = rand(1, 20);
<<<<<<< HEAD
        $symbolNumber = array_rand($symbols);
=======
>>>>>>> refs/remotes/origin/main
        $questions[$i] = "{$firstNumber} {$symbols[$symbolNumber]} {$secondNumber}";
        switch ($symbolNumber) {
            case 0:
                $correctAnswers[$i] = $firstNumber + $secondNumber;
                break;
            case 1:
                $correctAnswers[$i] = $firstNumber - $secondNumber;
                break;
            case 2:
                $correctAnswers[$i] = $firstNumber * $secondNumber;
                break;
        }
    }
    Engine\game($message, $questions, $correctAnswers);
}

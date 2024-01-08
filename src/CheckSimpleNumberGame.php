<?php

namespace BrainGames\SimpleNumberGame;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;
use function cli\prompt;
function CheckIfSimple($inputNumber)
{
    $total_divisors = 0;
    for ($i = 1; $i <= $inputNumber; $i++) {
        if ($inputNumber % $i == 0) {
            $total_divisors++;
        }
    }
    return $total_divisors == 2 ? "yes" : "no";
}

function CheckSimpleNumberGame(){
    $name = Cli\askName();
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 1; $i <= 3; $i++) {
        $number = rand(0, 100);
        line("Question: {$number}");
        $correctAnswer = CheckIfSimple($number);
        $answer = Engine\getAnswer();
        if ($answer != $correctAnswer) {
            Engine\printWrongAnswer($answer, $correctAnswer);
            Engine\sayTryAgain($name);
            break;
        }
            Engine\sayCorrect();
            if ($i === 3){
                Engine\endGame($name);
        }
    }
}
<?php

namespace Braingames\ProgressionGame;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function ProgressionGame(){
    $name = Cli\askName();
    line("What number is missing in the progression?");
    for ($i = 0; $i < 3; $i++){
        $progressionIndex = rand(1, 5);
        $missedNumberIndex = rand(0, 9);
        $startNumber = rand(0, 20);
        $progression = [];
        for ($j = 0; $j < 10; $j++){
            $progression[] = $progressionIndex * $j + $startNumber;
        }
        $correctAnswer = $progression[$missedNumberIndex];
        $progression[$missedNumberIndex] = '..';
        line("Question: " . implode(' ', $progression));
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer){
            line("Correct!");
            if ($i == 2){
                line("Congratulations, {$name}!");
            }
        }
        else{
            Engine\printWrongAnswer($answer, $correctAnswer);
            line("Let's try again, Sam!");
            break;
        }
    }
}
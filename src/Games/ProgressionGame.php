<?php

namespace Braingames\ProgressionGame;

use BrainGames\Engine;

function ProgressionGame()
{
    $massege = "What number is missing in the progression?";
    $questions = [];
    $correctAnswers = [];
    for ($i = Engine\FIRSTROUNDNUMBER; $i <= Engine\GAMEROUNDSNUMBER; $i++) {
        $progressionIndex = rand(1, 5);
        $missedNumberIndex = rand(0, 9);
        $startNumber = rand(0, 20);
        $progression = [];
        for ($j = 0; $j < 10; $j++) {
            $progression[] = $progressionIndex * $j + $startNumber;
        }
        $correctAnswers[$i] = $progression[$missedNumberIndex];
        $progression[$missedNumberIndex] = '..';
        $questions[$i] = implode(' ', $progression);
    }
    Engine\game($massege, $questions, $correctAnswers);
}

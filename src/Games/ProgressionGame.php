<?php

namespace Braingames\ProgressionGame;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function ProgressionGame()
{
    $massege = "What number is missing in the progression?";
    $questions = [];
    $correctAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $progressionIndex = rand(1, 5);
        $missedNumberIndex = rand(0, 9);
        $startNumber = rand(0, 20);
        $progression = [];
        for ($j = 0; $j < 10; $j++) {
            $progression[] = $progressionIndex * $j + $startNumber;
        }
        $correctAnswers[] = $progression[$missedNumberIndex];
        $progression[$missedNumberIndex] = '..';
        $questions[] = implode(' ', $progression);
    }
    Engine\game($massege, $questions, $correctAnswers);
}

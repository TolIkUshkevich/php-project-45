<?php

namespace BrainGames\Games\BrainProgression;

use BrainGames\Engine;

const MAX_POSSIBLE_INDEX = 9;
const MIN_POSSIBLE_INDEX = 0;
const PROGRESSION_MAX_FIRST_NUMBER = 20;
const MIN_INTERVAL = 1;
const MAX_INTERVAL = 5;

function brainProgression(): void
{
    $message = "What number is missing in the progression?";
    $questionsAndAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $progressionIndex = rand(MIN_INTERVAL, MAX_INTERVAL);
        $missedNumberIndex = rand(MIN_POSSIBLE_INDEX, MAX_POSSIBLE_INDEX);
        $startNumber = rand(engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, PROGRESSION_MAX_FIRST_NUMBER);
        $endNumber = ($progressionIndex * MAX_POSSIBLE_INDEX) + $startNumber;
        $progression = range($startNumber, $endNumber, $progressionIndex);
        $correctAnswer = $progression[$missedNumberIndex];
        $progression[$missedNumberIndex] = '..';
        $questionsAndAnswers[$i] = [
            "question" => implode(' ', $progression),
            "answer" => sprintf("%s", $correctAnswer)];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

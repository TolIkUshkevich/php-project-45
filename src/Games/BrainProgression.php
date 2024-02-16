<?php

namespace BrainGames\Games\BrainProgression;

use BrainGames\Engine;

const LENGTH_OF_PROGRESSION = 10;
const PROGRESSION_MAX_FIRST_NUMBER = 20;
const MIN_INTERVAL = 1;
const MAX_INTERVAL = 5;
const MIN_MISSED_NUMBER_INDEX = 0;
const MAX_MISSED_NUMBER_INDEX = 9;

function brainProgression(): void
{
    $message = "What number is missing in the progression?";
    $questions = [];
    $questionsAndAnswers = [];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $progressionIndex = rand(MIN_INTERVAL, MAX_INTERVAL);
        $missedNumberIndex = rand(MIN_MISSED_NUMBER_INDEX, MAX_MISSED_NUMBER_INDEX);
        $startNumber = rand(engine\EVERY_GAME_MIN_NUMBER, PROGRESSION_MAX_FIRST_NUMBER);
        $progression = [];
        for ($j = 0; $j < LENGTH_OF_PROGRESSION; $j++) {
            $progression[] = $progressionIndex * $j + $startNumber;
        }
        $correctAnswer = $progression[$missedNumberIndex];
        $progression[$missedNumberIndex] = '..';
        $questionsAndAnswers[$i] = ["question" => implode(' ', $progression), "answer" => $correctAnswer];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

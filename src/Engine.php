<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_NUMBER = 3;
const FIRST_ROUND_NUMBER = 1;
const EVERY_GAME_MIN_NUMBER = 1;

/**
 * @param array<mixed> $questions
 * @param array<mixed> $correctAnswers
 */
function runGame(string $message, array $questions, array $correctAnswers): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    line($message);
    for ($i = FIRST_ROUND_NUMBER; $i <= GAME_ROUNDS_NUMBER; $i++) {
        $question = $questions[$i];
        line("Question: {$question}");
        $answer = prompt('Your answer');
        $correctAnswer = $correctAnswers[$i];
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");        
    }
    line("Congratulations, %s!", $name);
}

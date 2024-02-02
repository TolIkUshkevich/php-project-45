<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_NUMBER = 3;
const FIRST_ROUND_NUMBER = 1;

function game(string $message, array $questions, array $correctAnswers)
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
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }

        line("Correct!");
        if ($i === GAME_ROUNDS_NUMBER) {
            line("Congratulations, %s!", $name);
        }
    }
}

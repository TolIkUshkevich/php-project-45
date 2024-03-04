<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_NUMBER = 3;
const FIRST_ROUND_NUMBER = 1;
const EVERY_GAME_MIN_POSSIBLE_NUMBER = 1;

 /**
 * @param array<mixed> $questionsAndAnswers
 * @param int $questionNumber
 */

function getQuestion(array $questionsAndAnswers, int $questionNumber): string
{
    return $questionsAndAnswers[$questionNumber]["question"];
}

 /**
 * @param array<mixed> $array
 * @param int $counter
 */

function getAnswer(array $questionsAndAnswers, int $answerNumber): string
{
    return $questionsAndAnswers[$answerNumber]["answer"];
}

 /**
 * @param array<mixed> $questionsAndAnswers
 */

function runGame(string $message, array $questionsAndAnswers): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    line($message);
    for ($i = FIRST_ROUND_NUMBER; $i <= GAME_ROUNDS_NUMBER; $i++) {
        $question = getQuestion($questionsAndAnswers, $i);
        $correctAnswer = getAnswer($questionsAndAnswers, $i);
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}

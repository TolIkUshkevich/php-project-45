<?php

namespace BrainGames\Engine;

use function Cli\line;
use function Cli\prompt;

function printWrongAnswer($answer, $correctAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
}

function askName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    return $name;
}

function getAnswer()
{
    return prompt('Your answer');
}

function sayTryAgain($name)
{
    line("Let's try again, %s", $name);
}

function sayCorrect()
{
    line("Correct!");
}

function endGame($name)
{
    line("Congratulations, %s!", $name);
}

function checkIfEven($number): bool
{
    return $number % 2 === 0;
}

function game($massage, $questions, $correctAnswers)
{
    $name = askName();
    line($massage);
    for ($i = 0; $i < 3; $i++) {
        $question = $questions[$i];
        line("Question: {$question}");
        $answer = getAnswer();
        $correctAnswer = $correctAnswers[$i];
        if ($answer != $correctAnswer) {
            printWrongAnswer($answer, $correctAnswer);
            sayTryAgain($name);
            break;
        }

        sayCorrect();
        if($i === 2) {
            endGame($name);
        }
    }
}
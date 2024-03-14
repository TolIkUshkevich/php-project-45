<?php

namespace BrainGames\Games\BrainCalc;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use BrainGames\Engine;

const MAX_POSSIBLE_GENERATED_NUMBER = 20;

function calculate(int $firstNumber, int $secondNumber, string $operator): int
{
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $firstNumber + $secondNumber;
            break;
        case '-':
            $result = $firstNumber - $secondNumber;
            break;
        case '*':
            $result = $firstNumber * $secondNumber;
            break;
        default:
            throw new Exception("Unknown operator '{$operator}'.");
    }
    return $result;
}

function brainCalc(): void
{
    $message = 'What is the result of the expression?';
    $questionsAndAnswers = [];

    $operators = [
        '+',
        '-',
        '*'
    ];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(Engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $secondNumber = rand(Engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $symbolNumber = array_rand($operators);
        $questionsAndAnswers[$i] = [
            "question" => sprintf("%s %s %s", $firstNumber, $operators[$symbolNumber], $secondNumber),
            "answer" => sprintf("%s", calculate($firstNumber, $secondNumber, $operators[$symbolNumber]))];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

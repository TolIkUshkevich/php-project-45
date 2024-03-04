<?php

namespace BrainGames\Games\BrainCalc;

use BrainGames\Engine;

const MAX_POSSIBLE_GENERATED_NUMBER = 20;

function calculate(int $firstNumber, int $secondNumber, string $symbol): int
{
    $result = 0;
    switch ($symbol) {
        case '+':
            $result = $firstNumber + $secondNumber;
            break;
        case '-':
            $result = $firstNumber - $secondNumber;
            break;
        case '*':
            $result = $firstNumber * $secondNumber;
            break;
    }
    return $result;
}

function brainCalc(): void
{
    $message = 'What is the result of the expression?';
    $questionsAndAnswers = [];

    $symbols = [
        '+',
        '-',
        '*'
    ];
    for ($i = Engine\FIRST_ROUND_NUMBER; $i <= Engine\GAME_ROUNDS_NUMBER; $i++) {
        $firstNumber = rand(Engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $secondNumber = rand(Engine\EVERY_GAME_MIN_POSSIBLE_NUMBER, MAX_POSSIBLE_GENERATED_NUMBER);
        $symbolNumber = array_rand($symbols);
        $questionsAndAnswers[$i] = [
            "question" => sprintf("%s %s %s", $firstNumber, $symbols[$symbolNumber], $secondNumber),
            "answer" => sprintf("%s", calculate($firstNumber, $secondNumber, $symbols[$symbolNumber]))];
    }
    Engine\runGame($message, $questionsAndAnswers);
}

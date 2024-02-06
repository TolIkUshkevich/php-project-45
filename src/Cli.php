<?php

namespace BrainGames\Cli;

use function cli\prompt;
use function cli\line;

function askName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    return $name;
}

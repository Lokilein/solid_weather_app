<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI;

class EntryPoint
{
    public function do(): void
    {
        $cliTools = new CliTools();
        $cliTools->writeLineBreak('Von welcher Stadt soll das Wetter angezeigt werden?');
        $city = trim($cliTools->readLine());
        $output = strtr(
            'Das Wetter in der Stadt %city: %weather. Es ist %temperature',
            [
                '%city' => $city,
                '%weather' => 'A',
                '%temperature' => 'B'
            ]
        );
        $cliTools->writeLineBreak($output);
    }
}
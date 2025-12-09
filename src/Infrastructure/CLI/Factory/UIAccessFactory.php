<?php

declare(strict_types=1);

namespace Lokil\SolidWeatherApp\Infrastructure\CLI\Factory;

use Lokil\SolidWeatherApp\Infrastructure\CLI\CLITools;
use Lokil\SolidWeatherApp\Infrastructure\CLI\UIAccess;

final class UIAccessFactory
{
    public function __invoke(): UIAccess
    {
        return new CLITools();
    }
}
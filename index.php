<?php

use Lokil\SolidWeatherApp\Start;

set_include_path(get_include_path() . PATH_SEPARATOR .__DIR__);
require_once 'vendor/autoload.php';

Start::run();
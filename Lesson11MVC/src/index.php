<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/composer/autoload_real.php';
//require __DIR__.'/../vendor/autoload.php';

use Lesson11MVC\Framework\DIContainer;

$container = new DIContainer();
$router = new Router($container);
$router->process($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

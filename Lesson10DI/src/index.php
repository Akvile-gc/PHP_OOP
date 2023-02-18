<?php
declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Lesson10DI\ProductAvailabilityApp;

use Lesson10DI\DIContainer;

$container = new DIContainer();

$app = $container->get(ProductAvailabilityApp::class);

$app->execute($argv);
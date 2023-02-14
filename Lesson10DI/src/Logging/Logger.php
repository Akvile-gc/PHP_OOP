<?php
declare(strict_types=1);
namespace Lesson10DI\src\Logging;
class Logger
{
    public function logMessage(string $message)
    {
        echo $message . PHP_EOL;
    }
}
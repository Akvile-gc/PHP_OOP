<?php
declare(strict_types=1);
namespace Lesson6\src\Logging;
class Logger
{
    public function logMessage(string $message)
    {
        echo $message . PHP_EOL;
    }
}
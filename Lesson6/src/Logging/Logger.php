<?php
declare(strict_types=1);
namespace Lesson6\Logging;
class Logger
{
    public function logMessage(string $message)
    {
        echo $message . PHP_EOL;
    }
}
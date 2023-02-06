<?php
declare(strict_types=1);
namespace Lesson6\Utils;
class Logger
{
    public function logMessage(string $message)
    {
        echo $message . PHP_EOL;
        file_put_contents('./log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}
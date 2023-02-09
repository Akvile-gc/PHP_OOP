<?php

declare(strict_types=1);

namespace Lesson8Composer\Logging;

class FileLogger extends Logger
{
    public function logMessage(string $message)
    {
        parent::logMessage($message);
        file_put_contents('./log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

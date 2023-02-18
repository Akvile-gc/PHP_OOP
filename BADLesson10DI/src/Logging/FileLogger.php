<?php
declare(strict_types=1);
namespace Lesson10DI\Logging;
class FileLogger
{
    public function __construct(private Logger $logger)
    {
    }

    public function logMessage(string $message)
    {
        $this->logger->logMessage($message);
        file_put_contents('./log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}
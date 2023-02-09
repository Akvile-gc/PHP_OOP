<?php

namespace Lesson8Composer\Logging;

use Monolog\Level;
use Monolog\Logger as Monolog;
use Monolog\Handler\StreamHandler;

class MonologLogger extends \Lesson8Composer\Logging\Logger
{
    public function logMessage(string $message)
    {
//        parent::logMessage($message);


        // create a log channel
        $log = new Monolog('inventory-checker');
        $log->pushHandler(new StreamHandler(__DIR__ . './../logs/inventory.log'));

        // add records to the log
        $log->info($message);
    }
}

<?php

spl_autoload_register(function ($className) {
    $classWithoutPrefix = str_replace('Lesson3\\', '', $className);
    require $classWithoutPrefix . '.php';
});

use Lesson3\src\Service\BankAccounts;
use Lesson3\src\Service\ChildAccount;
use Lesson3\src\Service\CreditAccount;
use Lesson3\src\Service\SavingsAccount;
use Lesson3\src\Service\StudentAccount;

$account = new BankAccount();
$account->getBalance();

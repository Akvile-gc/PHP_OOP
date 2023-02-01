<?php
namespace Lesson3\Service;

//require 'BankAccounts.php';
class StudentAccount extends BankAccount {

    public function deposit(int $amount): void
    {
        if ($amount > 0) {
            $this->balance = $this->balance + $amount;
        }
    }
}

$studentAccount = new StudentAccount(500);
$studentAccount->deposit(100);
echo $studentAccount->getBalance();
<?php

require '1_bank_account.php';

class ChildAccount extends BankAccount {
    public function spend(int $amount): void
    {
        if ($amount > $this->balance) {
            die('Cannot spend more than you have');
        }

        if ($amount <= 0) {
            die('Can only spend a positive amount');
        }

        if ($amount > 10) {
            die('Can only spend no more than 10 EUR');
        }

        $this->balance = $this->balance - $amount;
    }
}

$childAccount = new ChildAccount(500);
$childAccount->spend(10);
echo $childAccount->getBalance();
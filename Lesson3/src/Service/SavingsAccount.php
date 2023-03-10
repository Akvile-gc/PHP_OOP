<?php
//require 'BankAccounts.php';
namespace Lesson3\Service;
class SavingsAccount extends BankAccount{
    protected float $interest;
    public function __construct(int $balance = 0, float $interest = 0)
    {
        if ($balance < 0) {
            $this->balance = 0;
            die('Balance cannot be less than 0');
        }
        $this->balance = $balance;
        $this->interest = $interest;
    }

    public function deposit(int $amount): void
    {
        if ($this->interest){
            $this->balance = $this->balance + $this->interest;
        } else {
            parent::deposit($amount);
        }
    }
    public function addInterest (float $interestPercentage):void
    {
        $currentBalance = parent::getBalance();
        $this->interest = intval(round($currentBalance * $interestPercentage));
        $this->deposit($this->interest);
    }
}

$savingsAccount = new SavingsAccount(1000);
for($i = 0; $i < 10; $i++){
    $savingsAccount->addInterest(0.05);
    echo $savingsAccount->getBalance() . PHP_EOL;
}
<?php
require '1_bank_account.php';
class CreditAccount extends BankAccount {

    protected int $maxCreditAmount;
    public function __construct(int $balance = 0, int $maxCreditAmount = 0)
    {
        $this->maxCreditAmount = abs($maxCreditAmount);
        if ($balance < 0) {
            $this->balance = 0;
            die('Balance cannot be less than 0');
        }
        $this->balance = $balance;
    }

    public function spend(int $amount): void
    {
        $amountWithCredit = $this->balance + $this->maxCreditAmount;
        if ($amount > $amountWithCredit) {
            die('Cannot spend more than you have');
        }

        if ($amount <= 0) {
            die('Can only spend a positive amount');
        }

        $this->balance = $this->balance - $amount;
    }
}

$creditAccount = new CreditAccount(100, 100);
$creditAccount->spend(200);
echo $creditAccount->getBalance();
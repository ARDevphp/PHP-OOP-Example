<?php

declare(strict_types=1);

class BankAccount
{
    private int $accountNumber;
    private static int $balance = 0;
    private string $ownerName;
    private static array $accountNumberIndex = [];

    public function __construct(int $accountNumber, int $balance, string $ownerName)
    {
        if (in_array($accountNumber, self::$accountNumberIndex)) {
            echo "adding user";
        } else {
            $this->accountNumber = $accountNumber;
            self::$accountNumberIndex[] = $accountNumber;
            self::$balance += $balance;
            $this->ownerName = $ownerName;
        }
    }

    public function __toString()
    {
        return "$this->ownerName \n" .
            "account number " . $this->accountNumber . "\n" .
            "Hisobdagi mavjud balans " . self::$balance . "\n";
    }

    public function deposit(int $balance): int
    {
        return self::$balance += $balance;
    }

    public function yechibOlish(int $balance): int
    {
        if (self::$balance >= $balance) {
            return self::$balance -= $balance;
        } else {
            echo "Hisobingizda yetarli mablag' mavjud emas ";
            return self::$balance;
        }
    }
    public function show():void
    {
        echo self::$balance;
    }
}

class SavingsAccount extends BankAccount
{
    public function deposit(int $balance): int
    {
        $bonus = $balance / 10;
        $balance += $bonus;

        parent::deposit($balance);
        return parent::deposit($balance);
    }
}

$savingsAccount = new SavingsAccount(53434, 2000, 'Nozima');
$savingsAccount->deposit(1500);


<?php
class Account {
    protected static $bankName = "Global Bank"; // Static Variable
    protected $accountNumber;
    protected $balance;

    // Default Constructor
    // public function __construct() {
        // $this->balance = 0;
    // }

    // Parameterized Constructor
    public function __construct($accountNumber, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    // Copy Constructor
    public function copy(Account $acc) {
        $this->accountNumber = $acc->accountNumber;
        $this->balance = $acc->balance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient Balance!";
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    // Static Method
    public static function getBankName() {
        return self::$bankName;
    }
}
?>

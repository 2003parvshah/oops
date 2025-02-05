<?php
require_once 'AccountInterface.php';

abstract class BaseAccount implements AccountInterface {
    protected $accountNumber;
    protected $balance;

    // Constructor to initialize account details
    public function __construct($accountNumber, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    // Common deposit method for all accounts
    public function deposit($amount) {
        $this->balance += $amount;
    }

    // Abstract method for withdrawal logic
    abstract public function withdraw($amount);

    // Get balance method
    public function getBalance() {
        return $this->balance;
    }
}
?>

<?php
// require_once 'Account.php';

// class SavingsAccount extends Account {
    // private $interestRate;

    // Constructor Overloading Simulation (PHP does not support method overloading natively)
    // public function __construct($accountNumber, $balance = 0, $interestRate = 5) {
        // parent::__construct($accountNumber, $balance);
        // $this->interestRate = $interestRate;
    // }

    // public function applyInterest() {
        // $this->balance += ($this->balance * $this->interestRate / 100);
    // }

    // Overriding
    // public function getBalance() {
        // return "Savings Account Balance: $" . parent::getBalance();
    // }
// }



require_once 'BaseAccount.php';
require_once 'Interestable.php';

class SavingsAccount extends BaseAccount implements Interestable {
    private $interestRate;

    public function __construct($accountNumber, $balance = 0, $interestRate = 5) {
        parent::__construct($accountNumber, $balance);
        $this->interestRate = $interestRate;
    }

    // Apply interest to the balance
    public function applyInterest() {
        $this->balance += ($this->balance * $this->interestRate / 100);
    }

    // Withdrawal logic specific to savings accounts
    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient funds in Savings Account!<br>";
        }
    }
}

?>

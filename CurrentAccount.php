<!-- <?php
// require_once 'Account.php';

// trait OverdraftFeature {
    // private $overdraftLimit = 500;

    // public function useOverdraft($amount) {
        // if ($amount <= $this->overdraftLimit) {
            // $this->balance -= $amount;
        // } else {
            // echo "Overdraft limit exceeded!";
        // }
    // }
// }

// class CurrentAccount extends Account {
    // use OverdraftFeature; // Implementing Multiple Inheritance using Traits

    // public function __construct($accountNumber, $balance = 0) {
        // parent::__construct($accountNumber, $balance);
    // }

    // Overriding
    // public function getBalance() {
        // return "Current Account Balance: $" . parent::getBalance();
    // }
// }
?> -->
<?php
require_once 'BaseAccount.php';
require_once 'Overdraftable.php';

class CurrentAccount extends BaseAccount implements Overdraftable {
    private $overdraftLimit;

    public function __construct($accountNumber, $balance = 0, $overdraftLimit = 500) {
        parent::__construct($accountNumber, $balance);
        $this->overdraftLimit = $overdraftLimit;
    }

    // Withdrawal logic with overdraft
    public function withdraw($amount) {
        if ($this->balance + $this->overdraftLimit >= $amount) {
            $this->balance -= $amount;
        } else {
            echo "Overdraft limit exceeded in Current Account!<br>";
        }
    }

    // Use overdraft functionality
    public function useOverdraft($amount) {
        if ($amount <= $this->overdraftLimit) {
            $this->balance -= $amount;
        } else {
            echo "Cannot exceed overdraft limit of $this->overdraftLimit!<br>";
        }
    }
}
?>


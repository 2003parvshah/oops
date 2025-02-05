<!-- <?php
// require_once 'Bank.php';
// require_once 'Account.php';
// require_once 'SavingsAccount.php';
// require_once 'CurrentAccount.php';
// require_once 'Customer.php';
// require_once 'Transactions.php';
// 
// Creating Bank Instance
// $bank = new Bank();
// echo "Welcome to " . $bank->getBankName() . "<br>";
// 
// Creating Customer
// $customer1 = new Customer("John Doe", "123456789");
// echo $customer1->getCustomerDetails() . "<br>";
// 
// Creating Savings Account
// $savings = new SavingsAccount(101, 500);
// $savings->applyInterest();
// echo $savings->getBalance() . "<br>";
//  
// Creating Current Account
// $current = new CurrentAccount(102, 1000);
// $current->useOverdraft(200);
// echo $current->getBalance() . "<br>";
// 
// Demonstrating Static Method & Variable
// echo "Bank Name: " . Account::getBankName() . "<br>";
// 
// Transaction between accounts
// Transactions::transfer($savings, $current, 100);
// echo $savings->getBalance() . "<br>";
// echo $current->getBalance() . "<br>";
?> -->


<?php
require_once 'SavingsAccount.php';
require_once 'CurrentAccount.php';

// Create a Savings Account
$savings = new SavingsAccount(101, 1000, 5);
echo "Savings Account Balance Before Interest: $" . $savings->getBalance() . "<br>";
$savings->applyInterest();
echo "Savings Account Balance After Interest: $" . $savings->getBalance() . "<br>";

// Deposit and withdraw from Savings Account
$savings->deposit(500);
$savings->withdraw(300);
echo "Savings Account Balance After Transactions: $" . $savings->getBalance() . "<br>";

// Create a Current Account
$current = new CurrentAccount(102, 500, 1000);
echo "Current Account Balance: $" . $current->getBalance() . "<br>";

// Withdraw using overdraft
$current->withdraw(1200); // Within overdraft limit
echo "Current Account Balance After Withdrawal: $" . $current->getBalance() . "<br>";

// Attempt to exceed overdraft
$current->withdraw(500); // Exceeds overdraft limit
?>


<?php
class Customer {
    public $name; // Public Variable
    private $ssn; // Private Variable

    // Constructor
    public function __construct($name, $ssn) {
        $this->name = $name;
        $this->ssn = $ssn;
    }

    public function getCustomerDetails() {
        return "Customer: " . $this->name . " | SSN: " . $this->getSSN();
    }

    private function getSSN() {
        return "XXX-XX-" . substr($this->ssn, -4);
    }
}
?>

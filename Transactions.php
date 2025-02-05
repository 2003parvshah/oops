<?php
class Transactions {
    public static function transfer(Account $from, Account $to, $amount) {
        $from->withdraw($amount);
        $to->deposit($amount);
    }
}
?>

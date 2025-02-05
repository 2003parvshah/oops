<?php

namespace App\Contracts;

interface PaymentGatewayInterface {
    public function charge(float $amount): string;
    public function refund(float $amount): string;
}

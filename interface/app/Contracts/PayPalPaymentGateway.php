<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class PayPalPaymentGateway implements PaymentGatewayInterface {
    public function charge(float $amount): string {
        return "Charged $amount using PayPal";
    }

    public function refund(float $amount): string {
        return "Refunded $amount using PayPal";
    }
}

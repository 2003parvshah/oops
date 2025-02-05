<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class StripePaymentGateway implements PaymentGatewayInterface {
    public function charge(float $amount): string {
        return "Charged $amount using Stripe";
    }

    public function refund(float $amount): string {
        return "Refunded $amount using Stripe";
    }
}

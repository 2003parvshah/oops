<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contracts\PaymentGatewayInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    protected $paymentGateway;

    // Use Dependency Injection to resolve the implementation
    public function __construct(PaymentGatewayInterface $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function charge(float $amount) {
        $message = $this->paymentGateway->charge($amount);
        return response()->json(['message' => $message]);
    }

    public function refund(float $amount) {
        $message = $this->paymentGateway->refund($amount);
        return response()->json(['message' => $message]);
    }
}
?>
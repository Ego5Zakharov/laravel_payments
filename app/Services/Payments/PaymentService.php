<?php

namespace App\Services\Payments;

use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Drivers\PaymentDriver;
use App\Services\Payments\Drivers\PaymentDriverFactory;

class PaymentService
{
    public function getDriver($driver): PaymentDriver
    {
        return (new PaymentDriverFactory)->make($driver);
    }

    public function createPayment(): CreatePaymentAction
    {
        return new CreatePaymentAction;
    }
}

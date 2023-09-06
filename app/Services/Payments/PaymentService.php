<?php

namespace App\Services\Payments;

use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Actions\FindPaymentMethodAction;
use App\Services\Payments\Actions\GetPaymentMethodsAction;
use App\Services\Payments\Actions\UpdatePaymentAction;
use App\Services\Payments\Drivers\PaymentDriver;
use App\Services\Payments\Drivers\PaymentDriverFactory;
use App\Services\Payments\Models\PaymentMethod;

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

    public function findPaymentMethod(): FindPaymentMethodAction
    {
        return new FindPaymentMethodAction;
    }

    public function updatePayment(): UpdatePaymentAction
    {
        return new UpdatePaymentAction;
    }

    public function getPaymentMethods(): GetPaymentMethodsAction
    {
        return new GetPaymentMethodsAction;
    }
}

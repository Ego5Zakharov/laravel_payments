<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentRequest;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;
use App\Services\Payments\PaymentService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function checkout(Payment $payment, PaymentService $paymentService): Factory|View|Application
    {
        abort_unless($payment->status->isPending(), 404);

        $paymentMethods = $paymentService
            ->getPaymentMethods()
            ->active()
            ->run();

        return view('payments.checkout', compact('payment', 'paymentMethods'));
    }

    public function method(UpdatePaymentRequest $request, Payment $payment, PaymentService $paymentService)
    {
        abort_unless($payment->status->isPending(), 404);

        $validated = $request->validated();

        $method = $paymentService
            ->findPaymentMethod()
            ->id($validated['method_id'])
            ->active(true)
            ->run();

        $paymentService->updatePayment()
            ->method($method)
            ->run($payment);

        return redirect()->route('payments.process', $payment->uuid);
    }

    public function process(Payment $payment)
    {
        abort_unless($payment->status->isPending(), 404);

        return 'Оплата выбранным способом' . $payment->method->name;
    }
}

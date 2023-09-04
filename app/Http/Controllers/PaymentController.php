<?php

namespace App\Http\Controllers;

use App\Services\Payments\Models\Payment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{
    public function checkout(Payment $payment): Factory|View|Application
    {
        return view('payments.checkout', compact('payment'));
    }
}

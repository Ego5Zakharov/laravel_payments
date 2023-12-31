<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/orders')->name('home');

Route::get('orders', [OrderController::class, 'index'])->name('orders');
Route::get('orders/{order:uuid}', [OrderController::class, 'show'])->name('orders.show');
Route::post('orders/{order:uuid}/payment', [OrderController::class, 'payment'])->name('orders.payment');

Route::get('payments/{payment:uuid}/checkout', [PaymentController::class, 'checkout'])->name('payments.checkout');
Route::post('payments/{payment:uuid}/method', [PaymentController::class, 'method'])->name('payments.method');
Route::get('payments/{payment:uuid}/process', [PaymentController::class, 'process'])->name('payments.process');


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->timestamps();

            $table->string('status');

            $table->string('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');

            $table->decimal('amount', 12, 2);

            $table->string('payable_type'); // App\Services\Orders\Model\Order
            $table->integer('payable_id');

            $table->foreignId('method_id')->nullable();
            $table->foreign('method_id')->references('id')->on('payment_methods');

            $table->string('driver')->nullable();
//            $table->morphs('payable');
        });
    }


    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

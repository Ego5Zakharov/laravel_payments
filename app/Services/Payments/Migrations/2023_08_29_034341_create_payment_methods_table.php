<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{

    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->boolean('active')->default(false);
            $table->string('driver'); // stripe, tickoff, yookassa

        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}

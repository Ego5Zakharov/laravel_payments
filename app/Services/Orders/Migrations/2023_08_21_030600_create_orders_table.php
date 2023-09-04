<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('status'); // pending, completed, cancelled
            $table->decimal('amount', 12, 2);

            $table->string('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

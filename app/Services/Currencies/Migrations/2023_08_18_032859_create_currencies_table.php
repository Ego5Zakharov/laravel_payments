<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->timestamps();

            $table->string('name');

        });
    }

    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}

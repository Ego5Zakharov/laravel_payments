<?php

namespace Database\Seeders;

use App\Services\Orders\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Order::factory(100)->create();
//        OrderFactory::factoryForModel(Order::class)->create();
    }
}

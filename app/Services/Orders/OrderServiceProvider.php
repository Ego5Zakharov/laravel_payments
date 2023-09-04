<?php

namespace App\Services\Orders;

use App\Services\Orders\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{

    public function register()
    {


    }

    public function boot()
    {
        Relation::enforceMorphMap([
            'order' => Order::class
        ]);
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Migrations/');


        }
    }
}

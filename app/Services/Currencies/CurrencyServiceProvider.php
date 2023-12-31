<?php

namespace App\Services\Currencies;

use App\Services\Currencies\Commands\InstallCurrenciesCommand;
use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->loadMigrationsFrom(__DIR__ . '/Migrations');

            $this->commands([
                InstallCurrenciesCommand::class,
            ]);
        };
    }
}

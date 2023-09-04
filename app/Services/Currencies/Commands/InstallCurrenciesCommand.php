<?php

namespace App\Services\Currencies\Commands;

use App\Services\Currencies\Models\Currency;
use Illuminate\Console\Command;

class InstallCurrenciesCommand extends Command
{

    protected $signature = 'currencies:install';


    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $this->warn('Установка валют...');

        $this->installCurrencies();

        $this->info('Валюты установлены');
    }

    private function installCurrencies()
    {
        Currency::query()->firstOrCreate([
            'id' => Currency::RUB
        ],
            [
                'name' => 'Рубль'
            ]
        );
    }
}

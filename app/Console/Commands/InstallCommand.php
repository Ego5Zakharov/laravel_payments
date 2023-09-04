<?php

namespace App\Console\Commands;

use App\Services\Currencies\Commands\InstallCurrenciesCommand;
use App\Services\Payments\Commands\InstallPaymentsCommand;
use Illuminate\Console\Command;

class InstallCommand extends Command
{

    protected $signature = 'install';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->warn('Установка приложения...');

        $this->call(InstallCurrenciesCommand::class);

        $this->call(InstallPaymentsCommand::class);

        $this->info('Приложение установлено');
    }
}

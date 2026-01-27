<?php

namespace App\Console;

use App\Console\Commands\BarsGenerateCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        BarsGenerateCommand::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
    }
}

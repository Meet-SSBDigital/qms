<?php

namespace App\Console;

use Illuminate\Console\Command;
use App\Console\Commands\TestCron;
use App\Console\Commands\DatabaseBackUp;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands=[
        Commands\DatabaseBackUp::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('database:backup')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
      


        require base_path('routes/console.php');
    }
}

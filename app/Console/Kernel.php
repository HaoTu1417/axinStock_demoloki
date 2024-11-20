<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        // $schedule->command('process-wallet:run')->dailyAt('00:00');
        $schedule->command('hnx:run');
        $schedule->command('hnx1:run');
        $schedule->command('hnx30:run');
        $schedule->command('hose:run');
        $schedule->command('hose1:run');
        $schedule->command('upcom:run');
        $schedule->command('upcom1:run');
        $schedule->command('vn30:run');
        $schedule->command('vnindex:run');
        $schedule->command('syncopen:run');
        $schedule->command('syncstock:run');
        
        $schedule->command('process-wallet:run');
        
        $schedule->command('warning_debt:run');
        $schedule->command('warning_money:run');


        

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

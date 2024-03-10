<?php

namespace App\Console;

use App\Console\Commands\CleanRegisterCommand;
use App\Console\Commands\KuotaSynchCommand;
use App\Console\Commands\WaitingNotifCommand;
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
    protected $commands = [
        CleanRegisterCommand::class,
        KuotaSynchCommand::class,
        WaitingNotifCommand::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:delete-unconfirmed')->everyMinute();
        $schedule->command('kuota:synch')->everyMinute();
        $schedule->command('waiting:notif')->hourly();
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

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * cung cấp các lệnh artisan bằng ứng dụng
     *
     * @var array
     */
    protected $commands = [
        Commands\UpdateStoredInDay::class
    ];

    /**
     * Xác định lịch trình lệnh của ứng dụng.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Đăng ký các lệnh cho ứng dụng.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

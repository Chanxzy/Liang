<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Pesanan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\DemoCron::class,
    ];

    // Function schedule StatusReservasiUpdate 
    // yang diupdate setiap 15 menit sekali
    protected function schedule(Schedule $schedule)
    {
        // panggil function ini
        $schedule->call(function () {
            // Reservasi yang memiliki id_status = 1 (New Reservation)
        $currentDateTime = date('Y-m-d H:i:s'); // Get current date and time in the desired format

        $futureDateTime = date('Y-m-d H:i:s', strtotime("-12 hours", strtotime($currentDateTime))); // Add 12 hours

        $pesanan = Pesanan::where('status_bayar', 'belum')
            ->where('created_at', '<=', $futureDateTime)
            ->update(['status_bayar' => 'batal']);

        })->everyMinute();
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
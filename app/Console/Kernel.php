<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Schema;
use Robust\Core\Models\Command as Task;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\MigrateData',
        'App\Console\Commands\FixImages',
        'App\Console\Commands\FixImagesCount',
        'App\Console\Commands\LocationDataMigrate',
        'App\Console\Commands\ListingDataMigrate',
        'App\Console\Commands\LeadDataMigrate',
        'App\Console\Commands\MarketReportMigrate',
        'App\Console\Commands\BannerMigrate',
        'App\Console\Commands\UpdateLocations'
    ];

    /**
     * Define the application's command schedule.
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       if(Schema::hasTable('commands')){
           $commands = Task::where('status', 1)->get();
           foreach($commands as $cmd){
               $frequency = $cmd->frequency;
               $schedule->command($cmd->command)->$frequency()->at($cmd->at ?? '24:10');
               \Log::info($cmd->command . " " . $frequency . "() at " . $cmd->at);
           }
       }
    }

    /**
     * Register the commands for the application.
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

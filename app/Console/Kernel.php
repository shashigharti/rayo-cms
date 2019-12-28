<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Robust\RealEstate\Console\Commands\GenerateMlsDataMap;
use Robust\RealEstate\Console\Commands\MlsPullData;
use Robust\RealEstate\Console\Commands\MlsPullImages;


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
        'App\Console\Commands\CreateLocations',
        'App\Console\Commands\CreateMarketReport',
        'App\Console\Commands\CreateAttributes',
        'App\Console\Commands\UpdateLocations',
        'App\Console\Commands\UpdateGeoLocations',
    ];

    /**
     * Define the application's command schedule.
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:user-alerts')
            ->daily()
            ->at('7:00');
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

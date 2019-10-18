<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Robust\LandMarks\Console\Commands\CleanLocationName;
use Robust\LandMarks\Console\Commands\CreateLocation;
use Robust\Mls\Console\Commands\CreateGeoLocation;
use Robust\Mls\Console\Commands\GenerateMlsDataMap;
use Robust\Mls\Console\Commands\GroupSubdivision;
use Robust\Mls\Console\Commands\MlsNames;
use Robust\Mls\Console\Commands\MlsPullData;
use Robust\Mls\Console\Commands\MLsReport;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        GenerateMlsDataMap::class,
        MlsPullData::class,
        CreateLocation::class,
        MlsNames::class,
        MLsReport::class,
        CleanLocationName::class,
        GroupSubdivision::class,
        CreateGeoLocation::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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

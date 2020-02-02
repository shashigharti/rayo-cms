<?php

namespace Robust\RealEstate\Console\Commands\DataPull;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


/**
 * Class RetsPullAll
 * @package Robust\RealEstate\Console\Commands
 */
class RetsPullAll extends Command
{

    /**
     * @var string
     */
    protected $signature = 'rws:pull-all {days}';

    /**
     * @var string
     */
    protected $description = 'Generates Listing detail';


    /**
     * RetsPullAll constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     *
     */
    public function handle()
    {
       $days = $this->argument('days');
       $this->info('Starting to Pull Data');
       Artisan::call('rws:data-pull',['days' => $days]);
       $this->info('Ending of Pull Data');
       $this->info('Starting to Pull Properties');
       Artisan::call('rws:properties-pull');
       $this->info('Ending of Pull Properties');
       $this->info('Starting to Pull images');
       Artisan::call('rws:images-pull');
       $this->info('Ending of Pull images');

       //call location update command

        $this->info('Updating Locations');
        Artisan::call('rws:update-locations-count');
        $this->info('Updating Locations Finished');
    }

}

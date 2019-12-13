<?php

namespace Robust\RealEstate\Console\Commands;

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
       Artisan::call('rws:data-pull',['days' => $days]);
       Artisan::call('rws:properties-pull');
       Artisan::call('rws:images-pull');
    }

}

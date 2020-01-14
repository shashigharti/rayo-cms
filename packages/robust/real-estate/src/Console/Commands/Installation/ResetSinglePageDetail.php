<?php

namespace Robust\RealEstate\Console\Commands\Installation;

use Illuminate\Console\Command;
use Robust\Core\Models\Setting;

/**
 * Class ResetSinglePageDetail
 * @package Robust\RealEstate\Console\Commands\Installation
 */
class ResetSinglePageDetail extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:reset-single-page-detail';
    /**
     * @var string
     */
    protected $description = 'Generates Listing detail';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $details = config('real-estate.single-page-detail');

        Setting::updateOrCreate(['slug' => 'data-mapping'], [
            'display_name' => 'Single Page Data Mapping',
            'package_name' => 'real-estate',
            'values' => json_encode($details)
        ]);
    }

}

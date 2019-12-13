<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\Core\Models\Setting;
use Robust\RealEstate\Repositories\Website\CoreSettingRepository;


/**
 * Class ListingDetail
 * @package Robust\RealEstate\Console\Commands
 */
class ListingDetail extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:listing-detail';
    /**
     * @var CoreSettingRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $description = 'Generates Listing detail';

    /**
     * ListingDetail constructor.
     * @param CoreSettingRepository $model
     */
    public function __construct(CoreSettingRepository $model)
    {
        parent::__construct();
        $this->model = $model;
    }


    /**
     *
     */
    public function handle()
    {
        $details = config('real-estate.detail');
        Setting::updateOrCreate(['slug'=>'listing-details'],[
            'display_name' => 'Listing Details',
            'package_name' => 'real-estate',
            'slug' => 'listing-details',
            'values' => json_encode($details)
        ]);
    }

}

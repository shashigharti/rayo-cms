<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Helpers\MlsNameHelper;


/**
 * Class MlsNames
 * @package Robust\Mls\Console\Commands
 */
class MlsNames extends Command
{
    /**
     * @var string
     */
    protected $signature = 'mls:names';

    /**
     * @var string
     */
    protected $description = 'Updates the mls names';

    /**
     * MlsNames constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param MlsNameHelper $mlsNameHelper
     */
    public function handle(MlsNameHelper $mlsNameHelper)
    {
        $listings = $mlsNameHelper->getListings();
        foreach ($listings as $key => $listing)
        {
            $data['listing_name'] = ucwords(strtolower($listing->listing_name));
            $data['zip'] = ucwords(strtolower($listing->zip));
            $data['area'] = ucwords(strtolower($listing->area));
            $data['city'] = ucwords(strtolower($listing->city));
            $data['county'] = ucwords(strtolower($listing->county));
            if($listing->district === null || $listing->district === '0' || $listing->district === 0 || empty($listing->district))
            {
                $data['district'] = 'Undefined';
            } else {
                $data['district'] = ucwords(strtolower($listing->district));
            }
            if($listing->subdivision === null || $listing->subdivision === '0' || $listing->subdivision === 0 || empty($listing->subdivision))
            {
                $data['subdivision'] = 'Undefined';
            } else {
                $data['subdivision'] = $listing->subdivision;
            }
            $listing->update($data);
        }
    }
}

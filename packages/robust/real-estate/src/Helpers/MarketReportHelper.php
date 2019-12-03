<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\CoreSetting;
use Robust\RealEstate\Repositories\Website\CoreSettingRepository;

/**
 * Class MarketReportHelper
 * @package Robust\RealEstate\Helpers
 */
class MarketReportHelper
{
    
    /**
     * @param Collection $locations
     * @param string $status
     * @return integer
     */
    public function countActive($locations, $status)
    {
        return $locations->filter(function ($model) use ($status){
            return ($model->status == $status);
        })->count();
    }

    /**
     * @param Collection $locations
     * @param string $status
     * @param string $attr
     * @return integer
     */
    public function countAvgActive($locations, $status, $attr)
    {  
        return $locations->filter(function ($model) use ($status){
            return ($model->status == $status);
        })->avg($attr);
    }
}

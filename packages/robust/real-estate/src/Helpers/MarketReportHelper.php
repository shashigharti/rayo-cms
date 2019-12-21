<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\CoreSetting;
use Robust\RealEstate\Models\MarketReport;
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

    /**
     * @param $id
     * @param $type
     * @return mixed
     */
    public function getMarketReportByLocation($id, $type)
    {
        //access through relation need to refactor
        return MarketReport::where('reportable_id',$id)->where('reportable_type',$type)->first();
    }

    /**
     * Generates price ranges
     * @return string
     */
    public function generatePriceRanges(){
        $config = config('rws.market-report.price-range');
        $i = $config['min'];
        $max = $config['max'];
        $priceArr = [];

        for (; $i <= $max; $i = $i + $config['increment']) {
            $priceArr[] = price_format($i);
        }
        if (array_search($max, $priceArr) < 0) {
            $priceArr[] = price_format($max);
        }

        return $priceArr;
    }
}

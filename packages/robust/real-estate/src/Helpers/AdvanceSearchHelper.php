<?php

namespace Robust\RealEstate\Helpers;


/**
 * Class AdvanceSearchHelper
 * @package Robust\RealEstate\Helpers
 */
class AdvanceSearchHelper
{
    /**
     * @return string
     */
    public function getSearchURL(){
        //for route with params
        $params = request()->route()->parameters();
        $route_name  = request()->route()->getName();
        return $route_name === 'website.home'?route('website.realestate.homes-for-sale'):route($route_name,$params);
    }
}

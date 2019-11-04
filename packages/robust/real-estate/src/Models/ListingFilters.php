<?php

namespace Robust\RealEstate\Models;

use Carbon\Carbon;

class ListingFilters extends QueryFilter
{
    public function sort($filter) {
        $today = Carbon::today();
        if ($filter == 'price_desc') {
            return $this->builder->orderBy('system_price', 'desc');
        } elseif ($filter == 'most_viewed') {
            return $this->builder->
            groupBy('listings.id')->
            leftJoin('user_listing_views', function ($join) {
                $join->on('listings.id', '=', 'user_listing_views.listing_id');
            })->orderBy('user_listing_views_count', 'desc');
        } elseif ($filter == 'price_asc') {
            return $this->builder->orderBy('system_price', 'asc');
        } elseif ($filter == 'updated_last') {
            return $this->builder->orderBy('update_date', 'desc');
        } elseif ($filter == 'last_added') {
            return $this->builder->orderBy('input_date', 'desc');
        } elseif ($filter == 'last_7') {
            return $this->builder->whereBetween('input_date', [
                Carbon::parse($today)->subWeek(),
                $today
            ])->orderBy('input_date', 'desc');
        } elseif ($filter == 'last_14') {
            return $this->builder->whereBetween('input_date', [
                Carbon::parse($today)->subWeeks(2),
                $today
            ])->orderBy('input_date', 'desc');
        } elseif ($filter == 'last_30') {
            return $this->builder->whereBetween('input_date', [
                Carbon::parse($today)->subMonth(),
                $today
            ])->orderBy('input_date', 'desc');
        } elseif ($filter == 'last_7_s') {
            return $this->builder->whereBetween('closing_date', [
                Carbon::parse($today)->subWeek(),
                $today
            ])->orderBy('closing_date', 'desc');
        } elseif ($filter == 'last_14_s') {
            return $this->builder->whereBetween('closing_date', [
                Carbon::parse($today)->subWeeks(2),
                $today
            ])->orderBy('closing_date', 'desc');
        } elseif ($filter == 'last_30_s') {
            return $this->builder->whereBetween('closing_date', [
                Carbon::parse($today)->subMonth(),
                $today
            ])->orderBy('closing_date', 'desc');
        } else {
            return $this->builder->orderBy('input_date', 'desc');
        }
    }

    public function pic_only($filter = null) {

        return $this->builder->where('picture_count', '>', '0');
    }

    public function class_sf($filter) {
        return $this->builder->where('class', $filter)->orderBy('input_date', 'desc');
    }

    public function class_mf($filter) {
        return $this->builder->where('class', $filter)->orderBy('input_date', 'desc');
    }

    public function class_ll($filter) {
        return $this->builder->where('class', $filter)->orderBy('input_date', 'desc');
    }

    public function lake($filter) {
        return $this->builder->where('lakechainname', $filter)->orderBy('input_date', 'desc');
    }

    public function price_desc() {
        return $this->builder->orderBy('system_price', 'desc');
    }

    public function price_asc() {
        return $this->builder->orderBy('system_price', 'asc');
    }

    public function price_min($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('system_price', '>', $number);
    }

    public function price($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('system_price', '>', $number);
    }

    public function price_max($number = 'default') {
        if ($number == 'default') {
            return $this->builder;
        }
        if (env('APP_CLIENT') == 'hawaii') {
            if ($number == '2000000+') {
                return;
            }
        } elseif (env('APP_CLIENT') == 'iowa') {
            if ($number == '1000000') {
                return;
            }
        } elseif (env('APP_CLIENT') == 'tampa') {
            if ($number == 'plus' || $number == '1000000') {
                return;
            }
        } else {
            if ($number == '1000000') {
                return;
            }
        }
        return $this->builder->where('system_price', '<=', $number);
    }

    public function maintenance_min($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('maintenance', '>', intval($number));
    }

    public function maintenance_max($number = 'default') {
        if ($number == '350') {
            return '';
        }
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('maintenance', '<=', intval($number));
    }

    public function beds_min($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('bedrooms', '>=', $number);
    }

    public function beds($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('bedrooms', '>=', $number);
    }

    public function beds_max($number = false) {
        if ($number == '5+') {
            return '';
        }
        if (env('APP_CLIENT') == 'santa-barbara') {
            if ($number == '5') {
                return $this->builder;
            }
        }
        if ($number && $number != 'default') {
            return $this->builder->where('bedrooms', '<=', $number);
        }
        return $this->builder;
    }

    public function baths_min($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('baths_full', '>=', $number);
    }

    public function baths($number = '0') {
        if ($number == 'default') {
            return $this->builder;
        }
        return $this->builder->where('baths_full', '>=', $number);
    }

    public function baths_max($number = false) {
        if ($number == '5+') {
            return '';
        }
        if (env('APP_CLIENT') == 'santa-barbara') {
            if ($number == '5') {
                return $this->builder;
            }
        }
        if ($number && $number != 'default') {
            return $this->builder->where('baths_full', '<=', $number);
        }
    }

    public function year_build_min($number = '1900') {
        if (env('APP_CLIENT') == 'iowa') {
            if (strpos($number, '-') !== false) {
                $seperate_number = explode("-", $number);
                $min_number = trim($seperate_number[1]);
            } else {
                $min_number = $number;
            }
            return $this->builder->where('year_built', '>=', $min_number);
        }
        return $this->builder->where('year_built', '>=', $number);
    }

    public function customRefrenceTimeUserAlert($reference_time){

        $this->builder->where(function (Builder $query) use ($reference_time) {
            $query->where('input_date', '>=', $reference_time);
            //->orWhere('input_date', '>=', $reference_time)
            //->orWhere('update_date', '>=', $reference_time);
        });
    }

    public function year_build_max($number) {
        if (env('APP_CLIENT') == 'santa-barbara') {
            if ($number == date('Y')) {
                return $this->builder;
            }
        }
        if (env('APP_CLIENT') == 'iowa') {
            if (strpos($number, '-') !== false) {
                $seperate_number = explode("-", $number);
                $max_number = trim($seperate_number[1]);
            } else {
                $max_number = $number;
            }
            return $this->builder->where('year_built', '<=', $max_number);
        }
        return $this->builder->where('year_built', '<=', $number);
    }

    public function year_build($filter) {
        return $this->builder->whereIn('year_built', $filter);
    }

    public function year_built($filter) {
        return $this->builder->whereIn('year_built', $filter);
    }

    public function garage($filter = []) {
        if (env('APP_CLIENT') == 'oregon') {
            if (count($filter) > 0) {
                $filter = array_filter($filter);
                $filter = $this->clientObj->doReplacements($filter);
                $this->builder->where(function (Builder $query) use ($filter) {
                    foreach ($filter as $value) {
                        $query->orWhere('parking', 'like', '%' . $value . '%');
                    }
                });
            } else {
                return '';
            }
        } else {
            return $this->builder->WhereIn('parking', $filter);
        }
    }

    public function style($filter = []) {
        $filter = array_filter($filter);
        $filter = $this->clientObj->doReplacements($filter);
        $this->builder->where(function (Builder $query) use ($filter) {
            foreach ($filter as $value) {
                $query->orWhere('listings.style', 'like', '%' . $value . '%');
            }
        });
    }

    public function sqft_min($number = '0') {
        if (env('APP_CLIENT') == 'oregon' && $number == '0') {
            return;
        }
        return $this->builder->where('total_finished_area', '>=', $number);
    }

    public function sqft_max($number = '0') {
        if (env('APP_CLIENT') == 'oregon' && $number == '0') {
            return;
        }
        if (env('APP_CLIENT') == 'hawaii') {
            if ($number == '2500') {
                return;
            } else {
                return $this->builder->where('total_finished_area', '<', $number);
            }
        }
        if (env('APP_CLIENT') == 'santa-barbara') {
            $max = '6000';
        } else {
            $max = '2500';
        }
        if (env('APP_CLIENT') == 'santa-barbara') {
            if ($number == $max) {
                return $this->builder;
            }
        }
        if ($number == $max) {
            return $this->builder->where('total_finished_area', '>=', $number);
        }
        if (env('APP_CLIENT') == 'oregon' || env('APP_CLIENT') == 'texas') {
            if ($number != '0') {
                return $this->builder->where('total_finished_area', '<=', $number);
            } else {
                return '';
            }
        }
        if ($number != '0') {
            return $this->builder->where('total_finished_area', '<', $number);
        }
    }

    public function sqft($filter) {
        return $this->builder->whereIn('total_finished_area', $filter);
    }

    public function status_a($filter) {
        return $this->builder->where('status', 'Active');
    }

    public function status_s($filter) {
        return $this->builder->where('status', 'Sold');
    }

    public function cooling($filter) {
        return $this->builder->whereIn('cooling_type', $filter);
    }

    public function propertySetings($filter = []) {        //??
        if ($filter) {
            $filter = array_filter($filter);
            if (env('APP_CLIENT') == 'alaska') {
                return $this->builder->whereIn('subclass', $filter);
            } else {
                return $this->builder->whereIn('class', $filter);
            }
        }
    }

    public function property_setting($filter = []) {
        if (env('APP_CLIENT') == 'minnesota-3')
        {
            $this->rochester_custom_type($filter);
            return;
        }

        $filter = array_filter($filter);
        $this->builder->where(function (Builder $query) use ($filter) {
            foreach ($filter as $value) {
                $query->orWhere('listings.property_setting', 'like', '%' . $value . '%');
            }
        });

        //$this->builder->whereIn('property_setting', $filter);
    }

    public function class_rochester($filter = []) {
        $filter = array_filter($filter);
        if (count($filter)) {
            $this->builder->whereIn('class', $filter);
        }
    }

    public function subclass($filter = []) {

        // Patch work for Alaska, we need to clear all these patchy solutions but that another
        // refactoring effort.
        $alaskaCustomStyles = ['Ranch', 'Split Entry', 'Log', 'Town Home', 'Multi-Level', 'Two-Story'];

        $filter = array_filter($filter);
        $filter = $this->clientObj->doReplacements($filter);
        $this->builder->where(function (Builder $query) use ($filter, $alaskaCustomStyles) {
            foreach ($filter as $value) {

                if (in_array($value, $alaskaCustomStyles)) {
                    $query->orWhere('listings.style', 'like', '%' . $value . '%');
                } else {
                    $query->orWhere('listings.subclass', 'like', '%' . $value . '%');
                }
            }
        });
    }


    // Only being used from front end, abstractlocationcontroller and listingscontroller, not being used for backend execution of queries, for ex: user alerts. Need to fix this.
    public function alaska_custom_type($filter = []){

        $styles = ['Ranch', 'Split Entry', 'Log', 'Town Home', 'Multi-Level', 'Two-Story'];

        $this->builder->where(function (Builder $query) use ($filter, $styles) {
            foreach ($filter as $value) {

                if (in_array($value, $styles)) {
                    $query->orWhere('listings.style', 'like', '%' . $value . '%');
                } else {
                    $query->orWhere('listings.subclass', 'like', '%' . $value . '%');
                }
            }
        });
    }

    public function rochester_custom_type($filter = []){
        $stylesForCCAndTH = ['(CC)', '(TH)'];

        $this->builder->where(function (Builder $query) use ($filter, $stylesForCCAndTH) {
            foreach ($filter as $value) {

                if (  $value === 'Condos & Townhouse') {
                    $query->orWhere('listings.style', 'like', '%' . $stylesForCCAndTH[0] . '%');
                    $query->orWhere('listings.style', 'like', '%' . $stylesForCCAndTH[1] . '%');
                } else {
                    $query->orWhere('listings.property_setting', 'like', '%' . $value . '%');
                }
            }
        });
    }

    public function sub_property($filter = []) {
        $filter = array_filter($filter);
        $this->builder->where(function (Builder $query) use ($filter) {
            foreach ($filter as $value) {
                $query->orWhere('sub_property', 'LIKE', '%' . $value . '%');
            }
        });
    }

    public function sub_property_is_set($filter = []) {
        $filter = array_filter($filter);
        if (in_array('Condo', $filter)) {

            $this->builder->whereNotNull('sub_property')
                ->where('sub_property', '<>', '0');
        }
    }

    public function property_class($filter = []) {
        $filter = array_filter($filter);
        if (count($filter)) {
            //if(in_array("Detached Single Family", $filter)) array_push($filter,"Single Family Detached");
            $this->builder->whereIn('listings.class', $filter);
        }
    }

    public function property_type($filter = []) {
        $filter = array_filter($filter);
        if (count($filter)) {
            foreach ($filter as $value) {
                $this->builder->where('listings.class', 'like', '%' . $value . '%');
            }
        }
    }

    public function land_lot($filter = []) {
        $filter = array_filter($filter);
        if (count($filter)) {
            $this->builder->whereIn('land_lot', $filter);
        }
    }

    public function external_amenities($filter = []) {
        foreach ($filter as $value) {
            return $this->builder->where('external_amenities', 'like', '%' . $value . '%');
        }
    }

    public function ocean($filter) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        foreach ($filter as $value) {

            if(env('APP_CLIENT') == 'north-michigan'){
                $this->builder->orWhere('lakewaterfront', 'like', '%' . $value . '%');
            }else{
                $this->builder->orWhere('waterfrontview', 'like', '%' . $value . '%');
            }

        }
    }

    public function landscaping($filter = []) {
        if (!is_array($filter)) {
            $this->builder->where('landscaping', 'like', '%' . $filter . '%');
        } else {
            foreach ($filter as $value) {
                $this->builder->where('landscaping', 'like', '%' . $value . '%');
            }
        }
    }

    public function location($filter = []) {
        if ($filter) {
            foreach ($filter as $value) {
                return $this->builder->where('location', 'like', '%' . $value . '%');
            }
        }
    }

    public function status($filter = []) {
        if ($filter == 'both') {
            return $this->builder;
        }
        $filter = array_filter($filter);
        if (count($filter)) {
            $this->builder->whereIn('listings.status', $filter);
        }
    }

    public function active_status() {
        return $this->builder->getActive();
    }

    public function sold_status() {
        return $this->builder->getSold();
    }

    public function basement($filter) {
        foreach ($filter as $value) {
            $this->builder->where('basement', 'like', '%' . $value . '%');
        }
    }

    public function acres_min($number = 0) {
        if (env('APP_CLIENT') == 'oregon' || env('APP_CLIENT') == 'texas' || env('APP_CLIENT') == 'san-antonio' || env('APP_CLIENT') == 'phoenix') {

            $number_arr = explode('-', $number);

            if (isset($number_arr[0]) && isset($number_arr[1])) {
                return $this->builder->whereBetween('acres', [intval($number_arr[0]), intval($number_arr[1])]);
            }
        }
        if (env('APP_CLIENT') == 'hawaii') {
            return $this->builder->where(DB::raw('(cast(lot_size as decimal(20, 2)) / 43560)'), '>=', $number);
        }
        if(is_numeric($number))
        {
            return $this->builder->where('acres', '>=', $number + 0);
        }
    }

    public function acres_max($number = 0) {
        if (env('APP_CLIENT') == 'iowa') {
            if ($number === '20+') {
                $number = 20;
                return $this->builder->where('acres', '>=', $number);
            } else {
                return $this->builder->where('acres', '<=', $number + 0);
            }
        }
        if (env('APP_CLIENT') == 'hawaii') {
            if ($number != 10) {
                return $this->builder->where(DB::raw('(cast(lot_size as decimal(20, 2)) / 43560)'), '<=', $number);
            } else {
                return;
            }
        }
        if (env('APP_CLIENT') == 'florida') {
            $max = '9';
        } else {
            $max = '19';
        }
        if (env('APP_CLIENT') == 'santa-barbara') {
            if ($number == '10') {
                return $this->builder;
            }
        }
        if ($number == $max) {
            return $this->builder->where('acres', '>=', $number);
        }
        return $this->builder->where('acres', '<=', $number + 0);
    }

    public function acres($filter) {
        if (env('APP_CLIENT') == 'oregon') {
            $filter_value = explode('-', $filter);
            if (count($filter_value) == 2) {
                return $this->builder->where('acres', '>', $filter_value[0] + 0)->where('acres', '<', $filter_value[1] + 0);
            } else {
                $filter_value[0] = rtrim($filter_value[0], '+');
                return $this->builder->where('acres', '>', $filter_value[0] + 0);
            }
        } else {
            $filterValue = (int) rtrim($filter, '+');
            return $this->builder->whereBetween(DB::raw('(cast(lot_size as decimal(20, 2)) / 43560)'), [$filterValue - 1, $filterValue]);
        }
    }

    public function amenities($filter = []) {
        if (is_array($filter)) {
            foreach ($filter as $value) {

                if (env('APP_CLIENT') == 'minnesota-3' && $value == 'Fireplace') {
                    $this->builder->where('fireplaces', '=', 'Yes');
                } elseif (env('APP_CLIENT') == 'santa-barbara') {
                    $this->builder->where(function ($query) use ($value) {
                        $query->where('amenities', 'like', '%' . $value . '%')
                            ->orWhere('external_amenities', 'like', '%' . $value . '%');
                    });
                } else {
                    $this->builder->where('amenities', 'like', '%' . $value . '%');
                }
            }
        } else {
            $this->builder->where('amenities', 'like', '%' . $filter . '%');
        }
    }

    public function interior($filter) {
        foreach ($filter as $value) {
            $this->builder->where('interior', 'like', '%' . $value . '%');
        }
    }

    public function foreclosureproperties() {
        $this->builder->whereIn('subclass',['Foreclosure','REO']);
    }

    public function exterior($filter) {
        foreach ($filter as $value) {
            $this->builder->where('exterior', 'like', '%' . $value . '%');
        }
    }

    public function lotDescription($filter) {
        foreach ($filter as $value) {
            $this->builder->where('lot_size', 'like', '%' . $value . '%');
        }
    }

    public function lotArea($filter) {
        foreach ($filter as $value) {
            $this->builder->where('lot_description', 'like', '%' . $value . '%');
        }
    }

    public function lot($filter) {
        if (env('APP_CLIENT') == 'oregon') {
            foreach ($filter as $value) {
                $this->builder->where('style', $value);
            }
            return;
        }
        foreach ($filter as $value) {
            $this->builder->where('lot', 'like', '%' . $value . '%');
        }
    }

    public function stories($filter) {
        if (env('APP_CLIENT') == 'grandrapids') {
            $this->builder->whereIn('stories', $filter);
        } else {
            foreach ($filter as $value) {
                $this->builder->orWhere('stories', 'like', '%' . $value . '%');
            }
        }
    }

    public function pool($filter = []) {
        if (env('APP_CLIENT') == 'iowa') {

            if ($filter == 'Yes') {

                $this->builder->where('amenities', '=', 'Pool');
            } elseif ($filter == 'No') {
                $this->builder->where('amenities', '!=', 'Pool');
            } else {

            }
        } else if (env('APP_CLIENT') == 'hawaii' || env('APP_CLIENT') === 'panama') {
            if ($filter == 'Yes') {
                $this->builder->whereNotIn('pool', ['None', '0']);
            } else {
                $this->builder->whereIn('pool', ['None', '0']);
            }
        } else if (env('APP_CLIENT') == 'connecticut' || env('APP_CLIENT') == 'oregon' ||  env('APP_CLIENT') == 'phoenix') {
            foreach ($filter as $value) {
                $this->builder->orWhere('pool', 'like', '%' . $value . '%');
            }
        } else {
            foreach ($filter as $value) {
                if ($value == 'Yes') {

                    $this->builder->where('amenities', '=', 'Pool');
                } elseif ($value == 'No') {
                    $this->builder->where('amenities', '!=', 'Pool');
                }
            }
        }
    }

    public function property_frontpage($filter = []) {
        if (count($filter)) {

            $this->builder->whereIn('property_frontpage', $filter);
        }
    }

    public function property_condition($filter = []) {
        if (count($filter)) {

            $this->builder->whereIn('property_condition', $filter);
        }
    }

    public function topography($filter = []) {
        if (count($filter)) {

            $this->builder->whereIn('topography', $filter);
        }
    }

    public function how_sold($filter = []) {
        if (count($filter)) {
            foreach ($filter as $value) {

                $this->builder->where('how_sold', 'like', '%' . $value . '%');
            }
        }
    }

    public function owner_occupancy($filter = []) {
        if (count($filter)) {

            $this->builder->whereIn('owner_occupancy', $filter);
        }
    }

    public function construction($filter) {
        $this->builder->where(function ($query) use ($filter) {
            foreach ($filter as $value) {
                $query->orWhere('construction', 'like', '%' . $value . '%');
            }
        });
    }

    public function construction_status($filter = []) {
        if ($filter) {
            $this->builder->where(function ($query) use ($filter) {
                foreach ($filter as $value) {
                    $query->orWhere('construction_status', 'like', '%' . $value . '%');
                }
            });
        }
    }

    public function leadsSort($filter) {
        if ($filter == 'nameAsc') {
            $this->builder->orderBy('name', 'asc');
        }
        if ($filter == 'nameDesc') {
            $this->builder->orderBy('name', 'desc');
        }
    }

    // north michigan = nm
    public function waterfrontview_nm($filter = []){
        $this->builder->whereNotNull('waterfrontview')
            ->Where('waterfrontview', '=', 'Y');
    }

    public function waterfront_nm($filter = []){
        $this->builder->whereNotNull('waterfront_present')
            ->Where('waterfront_present', '=', 'Water Front');
    }

    public function wateraccess_nm($filter = []){
        $this->builder->whereNotNull('waterfront_present')
            ->Where('waterfront_present', '=', 'Water Access');
    }

    public function custom_waterfront_present($filter = []){
        $this->builder->whereNotNull('waterfront_present')
            ->Where('waterfront_present', '=', '1');
    }

    public function custom_condo($filter = []){
        $this->builder->whereNotNull('sub_property')
            ->Where('sub_property', 'Like', '%condo%');
    }

    public function condo_nm($filter = []){
        $this->builder->whereNotNull('sub_property')
            ->Where('sub_property', '=', 'Yes');
    }

    public function waterfront_view($filter = [])
    {
        if ($filter == 'isset') {
            $this->builder->whereNotNull('waterfrontview')
                ->Where('waterfrontview', '<>', '0');
        } elseif (is_array($filter)) {
            foreach ($filter as $value) {
                $this->builder->where('waterfrontview', 'like', '%' . $value . '%');
            }
        } else {
            $this->builder->where('waterfrontview', 'like', '%' . $filter . '%');
        }
    }

    public function water_features_present($filter = [])
    {
        foreach ($filter as $value) {
            if($value == 'Waterfront present')
            {
                $this->builder->whereNotNull('waterfront_present')
                    ->Where('waterfront_present', '=', 'Yes');
            }
            else if($value == 'Waterview present')
            {
                $this->builder->whereNotNull('waterfrontview')
                    ->Where('waterfrontview', '=', 'Yes');
            }

        }
    }

    public function water_features($filter = []) {
        foreach ($filter as $value) {
            $this->builder->where('water_description', 'like', '%' . $value . '%');
        }
    }

    public function historic_district() {
        $this->builder->whereIn('area', ['Historic North Side', 'Historic South Side']);
    }


    public function type_view($filter = []) {
        $filter = $this->clientObj->doReplacements($filter);
        $this->builder->where(function (Builder $query) use ($filter) {
            foreach ($filter as $value) {
                if (env('APP_CLIENT') == 'oregon') {
                    $query->orWhere('listings.subclass', 'like', '%' . $value . '%')
                        ->orWhere('listings.sub_property', 'like', '%' . $value . '%')
                        ->orWhere('listings.style', 'like', '%' . $value . '%');
                } else if (env('APP_CLIENT') == 'alaska') {
                    $query->orWhere('listings.subclass', 'like', '%' . $value . '%');
                } else {

                    // i dont know why style is added here - anand
                    $query->orWhere('listings.subclass', 'like', '%' . $value . '%')
                        ->orWhere('listings.style', 'like', '%' . $value . '%');
                }
            }
        });
    }

    public function waterfront($filter = []) {
        if ($filter == 'isset') {
            $this->builder->whereNotNull('waterfront_name')
                ->Where('waterfront_name', '<>', '0');
        } else {
            foreach ($filter as $value) {
                $this->builder->where('waterfront_name', 'like', '%' . $value . '%');
            }
        }
    }

    public function waterfront_sgi($filter = NULL) {
        if (isset($filter)) {
            $this->builder->whereNotNull('waterfrontview')
                ->Where('waterfrontview', '<>', '0');
            if ($filter == '1000000') {
                $this->builder->where('system_price', '>=', '1000000');
            } else {
                $sys_price = explode("-", $filter);
                $min_price = isset($sys_price[0]) ? $sys_price[0] : "0";
                $max_price = isset($sys_price[1]) ? $sys_price[1] : "1000000";
                $this->builder->whereBetween('system_price', [$min_price, $max_price]);
            }
        }
    }

    public function waterview_sgi($filter = NULL) {
        if (isset($filter)) {
            $this->builder->whereNotNull('waterfront_name')
                ->Where('waterfront_name', '<>', '0');
            if ($filter == '1000000') {
                $this->builder->where('system_price', '>=', '1000000');
            } else {
                $sys_price = explode("-", $filter);
                $min_price = isset($sys_price[0]) ? $sys_price[0] : "0";
                $max_price = isset($sys_price[1]) ? $sys_price[1] : "1000000";
                $this->builder->whereBetween('system_price', [$min_price, $max_price]);
            }
        }
    }

    public function zip($filter = []) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            return $this->builder->whereIn('listings.zip', $filter);
        }
    }

    public function finished_min($number = '0') {
        return $this->builder->where('total_finished_area', '>=', $number);
    }

    public function finished_max($number) {
        if ($number == '2500') {
            return $this->builder->where('total_finished_area', '>=', $number);
        }
        return $this->builder->where('total_finished_area', '<=', $number);
    }

    public function elementry($filter = []) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            if(count($filter == 1) && $filter[0] == "")
            {
                // do nothing.. its bad data
            }
            else
            {
                return $this->builder->whereIn('elem_school', $filter);
            }
        }
    }

    public function middle($filter = []) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            if(count($filter == 1) && $filter[0] == "")
            {
                // do nothing.. its bad data
            }
            else
            {
                return $this->builder->whereIn('middle_school', $filter);
            }
        }
    }

    public function high($filter = []) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            if(count($filter == 1) && $filter[0] == "")
            {
                // do nothing.. its bad data
            }
            else
            {
                return $this->builder->whereIn('high_school', $filter);
            }
        }
    }

    /**
     * The genric case applicable in case where data is messed up. In those cases
     * a general filter for school id shown.
     *
     */
    public function school($filter = []) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            return $this->builder->where(function (Builder $query) use ($filter) {
                $query->whereIn('high_school', $filter)
                    ->orWhereIn('middle_school', $filter)
                    ->orWhereIn('elem_school', $filter);
            });
        }
    }

    public function fireplace($filter) {
        return $this->builder->where('fireplaces', '=', $filter);
    }

    public function water_front($filter) {
        return $this->builder->where('lakewaterfront', '=', $filter);
    }

    public function lakewaterfront($filter) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            return $this->builder->whereIn('lakewaterfront', $filter);
        }
    }

    public function waterfront_footage($filter) {
        return $this->builder->where('waterfront_footage', $filter);
    }

    public function city($filter) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            return $this->builder->whereIn('listings.city', $filter);
        }
    }

    public function county($filter) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            return $this->builder->whereIn('listings.county', $filter);
        }
    }

    public function grid($filter) {
        if (is_string($filter)) {
            $filter = [$filter];
        }
        if (count($filter)) {
            return $this->builder->whereIn('listings.grid', $filter);
        }
    }

    public function custom_area($filter) {
        return $this->builder->where('listings.area',  'like', '%' . $filter . '%');
    }

    public function custom_building_name($filter) {
        return $this->builder->where('listings.building_name',  'like', '%' . $filter . '%');
    }

    public function subdivision($filter) {
        return $this->builder->where('listings.subdivision',  'like', '%' . $filter . '%');
    }

    public function all_location($filter = []) {
        $areaId = array();
        if (count($filter)) {
            if (env("APP_CLIENT") == "hawaii") {
                $areaId = \App\Area::whereIn('name', $filter)->pluck('id')->toArray();
                $models = SubdivisionsHelper::getSubDivisionsfromArea($areaId);
                $this->builder->where(function (Builder $query) use ($filter,$models) {
                    if(!empty($models))
                    {
                        // temporary fix for name mismatch problem.
                        $subDivNames = array_map('strtolower', $models->pluck('name')->toArray());
                        //$subDivString = implode(', ', $subDivNames);
                        $query->whereIn('subdivision', $subDivNames);
                        //$query->whereRaw("lower(subdivision) IN ($subDivString)");
                    }
                });
            } else {
                $this->builder->where(function (Builder $query) use ($filter) {
                    $query->whereIn('listings.city', $filter)
                        ->orWhereIn('listings.subdivision', $filter)
                        ->orWhereIn('listings.county', $filter)
                        ->orWhereIn('listings.district', $filter)
                        ->orWhereIn('listings.zip', $filter)
                        ->orWhereIn('listings.grid', $filter);
//                    ->orWhereIn('listings.area', $filter);
                });
            }
        }
        return $this->builder;
    }

    public function subdivision_group($filter) {
        // find all subdivs with group name
        // add where subdivs in
        $groupedSubdivs = Subdivision::where('group_slug', $filter)->get();
        $subdivsNames = $groupedSubdivs.pluck('name');
        return $this->builder->whereIn('listings.subdivision', $subdivsNames);
    }

    public function all_subdivision($filter) {
        if (count($filter)) {
            $this->builder->where(function (Builder $query) use ($filter) {
                $query->whereIn('listings.city', $filter)
                    ->orWhereIn('listings.subdivision', $filter)
                    ->orWhereIn('listings.county', $filter)
                    ->orWhereIn('listings.district', $filter)
                    ->orWhereIn('listings.zip', $filter)
                    ->orWhereIn('listings.grid', $filter);
//                    ->orWhereIn('listings.area', $filter);
            });
        }
    }

    public function all_zip($filter) {
        if (count($filter)) {
            $this->builder->where(function (Builder $query) use ($filter) {
                $query->whereIn('listings.city', $filter)
                    ->orWhereIn('listings.subdivision', $filter)
                    ->orWhereIn('listings.county', $filter)
                    ->orWhereIn('listings.district', $filter)
                    ->orWhereIn('listings.zip', $filter)
                    ->orWhereIn('listings.grid', $filter);
//                    ->orWhereIn('listings.area', $filter);
            });
        }
    }

    public function area($filter = []) {
        if ($filter) {
            if (env('APP_CLIENT') == 'florida') {
                return $this->builder->whereIn('listings.area', $filter);
            }
            else if(env('APP_CLIENT') == 'hawaii') {
                // this is temporary fix... need to fix problem from root
                $filterWithoutSpace = $nospaces = str_replace(' ', '', $filter);
                return $this->builder->where('lower(listings.area)', strtolower($filterWithoutSpace));
            }
            else{
                return $this->builder->where('listings.area', $filter);
            }
        }
    }

    // Sub area filter for panama
    public function subArea($filter = []) {
        if ($filter) {
            if (env('APP_CLIENT') == 'panama') {
                return $this->builder->whereIn('listings.sub_area', $filter);
            }
        }
    }

    // Anand Update :  We need to merge below two method later
    // Simialr to unique_property method but for santa barabar
    public function unique_property_sb($filter) {
        switch ($filter) {
            case 'Oceanfront Homes':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.location','LIKE','%Ocean%');
                });
                break;
            case 'Ocean View Homes':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.waterfrontview','LIKE','%Ocean%');
                });
                break;
            case 'Ocean View Condos':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.sub_property','LIKE','%Condo%')
                        ->where('listing_details.waterfrontview','LIKE','%Ocean%');
                });
                break;
            case 'Horse properties':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.amenities','LIKE','%Horse%')
                        ->orWhere('listing_details.external_amenities','LIKE','%Horse%')
                        ->orWhere('listing_details.landscaping','LIKE','%Horse%');
                });
                break;
            case 'Homes with pvt. Tennis Court':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.amenities','LIKE','%Tennis Court%')
                        ->orWhere('listing_details.external_amenities','LIKE','%Tennis Court%')
                        ->orWhere('listing_details.landscaping','LIKE','%Tennis Court%');
                });
                break;
            case 'Panoramic View':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.waterfrontview','LIKE','%Panoramic%');
                });
                break;
            case 'Homes with private Pool':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.amenities','LIKE','%Pool%')
                        ->orWhere('listing_details.external_amenities','LIKE','%Pool%')
                        ->orWhere('listing_details.landscaping','LIKE','%Pool%');
                });
                break;
            case 'Homes with Pool House':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.amenities','LIKE','%Pool%')
                        ->orWhere('listing_details.external_amenities','LIKE','%Pool%')
                        ->orWhere('listing_details.landscaping','LIKE','%Pool%');
                });
                break;
            case 'Guest House':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listing_details.amenities','LIKE','%Guest House%')
                        ->orWhere('listing_details.external_amenities','LIKE','%Guest House%')
                        ->orWhere('listing_details.landscaping','LIKE','%Guest House%');
                });
                break;
            case 'Homes with land':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.property_setting','LIKE','%Residential%');
                });
                break;
            case 'Fixer Uppers':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.property_setting','LIKE','%Residential%');
                });
                break;
            case 'Distressed Properties':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.property_setting','LIKE','%Residential%');
                });
                break;
            default:
                break;
        }
    }



    public function unique_property($filter) {
        // if ($filter && $filter == 'Acreage') {
        //     $this->builder->where(function (Builder $query) use ($filter) {
        //         $query->Where('listings.lot_size', '>', '0');
        //     });
        // }
        //Removed by Ashish Verma(No significant output from the below filter)
        // if ($filter) {
        //     $this->builder->where(function (Builder $query) use ($filter) {
        //         $query->where('listing_details.property_frontpage', $filter)
        //             ->orWhere('listings.sub_property', $filter)
        //             ->orWhere('listing_details.zoning', 'like', '%' . $filter . '%')
        //             ->orWhere('listing_details.waterfrontview', '<>', $filter);
        //     });
        // }
        switch ($filter) {
            case 'Golf Course':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->whereIn('listings.sub_property', ['Single Family', 'Townhouse']);
                });
                break;
            case 'Ocean':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->whereIn('listings.sub_property', ['Single Family', 'Townhouse']);
                });
                break;
            case 'Sandy Beach':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->whereIn('listings.sub_property', ['Single Family', 'Townhouse']);
                });
                break;
            case 'Kakaako':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.sub_property', ['Townhouse'])
                        ->where('listings.subdivision', 'Kakaako')
                        ->where('listing_details.land_lot', 'FS - Fee Simple');
                });
                break;
            case 'Townhouse':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.sub_property', ['Townhouse'])
                        ->where('listings.year_built', '>=', '2005')
                        ->where('listings.tmk_division', '1');
                });
                break;
            case 'Resort':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->whereIn('listings.sub_property', ['Single Family', 'Townhouse'])
                        ->whereIn('listings.subdivision', ['Ko Olina', 'Kuilima'])
                        ->where('listing_details.land_lot', 'FS - Fee Simple');
                });
                break;
            case 'Estate':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.sub_property', ['Single Family'])
                        ->where('listings.year_built', '>=', '2005')
                        ->where('listings.system_price', '>=', '3000000')
                        ->where('listings.total_finished_area', '>=', '4000')
                        ->where('listing_details.land_lot', 'FS - Fee Simple')
                        ->where('listings.acres', '>=', '5')
                        ->where('listing_details.property_condition', 'like', '%Excellent%')
                        ->where('listings.tmk_division', '1');
                });
                break;
            case 'Acreage':
                $this->builder->where(function (Builder $query) use ($filter) {
                    $query->Where('listings.lot_size', '>', '0');
                });
                break;
            case 'New-Construction':
                $this->builder->where(function(Builder $query) use ($filter) {
                    $query->where('listings.sub_property', ['Single Family'])
                        ->where('listings.year_built', '>=', '2014')
                        ->where('listing_details.land_lot', 'FS - Fee Simple')
                        ->where('listings.tmk_division', '1');
                });
                break;
            default:
                break;
        }
        return $this->builder;
    }

    public function universal($filter) {
        $addFilter = [];

        if (count($filter)) {

            $addressFilter = '';
            //seperate address from universal[] filter
            $customFilter = array_filter($filter, function ($var) {
                return (stripos($var, 'custom_') === false) ? false : true;
            });
            foreach ($customFilter as $newFilter) {
                $addressFilter .= ltrim($newFilter, "custom_") . ' ';
            }
            $addFilter = explode(' ', $addressFilter);
            $addFilter = array_filter($addFilter, function ($var) {
                return ($var == ",") ? false : true;
            });
            $addFilter = array_values(array_filter($addFilter));
            foreach ($filter as $key => $value) {
                $filter[$key] = ltrim($value, "custom_");
            }


            $this->builder->where(function ($query) use ($filter, $addFilter) {
                $query->whereIn('listings.city', $filter)
                    ->orWhereIn('listings.subdivision', $filter)
                    ->orWhereIn('listings.district', $filter)
                    ->orWhereIn('listings.zip', $filter)
                    ->orWhereIn('listings.grid', $filter)
                    ->orWhereIn('listings.mls_number', $filter);

                $query->orWhere(function ($query) use($addFilter) {
                    for ($i = 0; $i < count($addFilter); $i++) {
                        $query->orwhere('listings.address_number', $addFilter[$i]);
                        $query->orwhere('listings.address_street', $addFilter[$i]);
                        $query->orwhere('listings.state', 'like', '%' . $addFilter[$i] . '%');
                        $query->orwhere('listings.address', 'like', '%' . $addFilter[$i] . '%');
                    }
                });
            });
        }

        // dd($query);
        return $this->builder;
    }

    public function subdivisionIds($filter) {
        $subdivisionsNamesList = [];
        if (is_string($filter)) {
            $filter = explode(',', $filter);
        }
        if (count($filter)) {
            $subdivisionsNames = \App\Subdivision::query()->select('name')->whereIn('id', $filter)->get()->toArray();
            if (!empty($subdivisionsNames)) {
                foreach ($subdivisionsNames as $subdivisionsName) {
                    $subdivisionsNamesList[] = $subdivisionsName['name'];
                }
            }
            return $this->builder->whereIn('subdivision', $subdivisionsNamesList)->get();
        }
        return '';
    }

    public function foundationtype($filter) {
        if ($filter == 'isset') {
            $this->builder->whereNotNull('foundation_type')
                ->Where('foundation_type', '<>', '0');
        } else {
            foreach ($filter as $value) {
                $this->builder->where('foundation_type', 'like', '%' . $value . '%');
            }
        }
    }
}

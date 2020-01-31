<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Robust\RealEstate\Models\Banner;
use Robust\RealEstate\Repositories\Admin\BannerRepository;
use Robust\RealEstate\Repositories\Website\ListingRepository;
use Robust\RealEstate\Repositories\Website\LocationRepository;

/**
 * Class BannerPropertyCount
 * @package Robust\RealEstate\Console\Commands
 */
class BannerPropertyCount extends Command
{
    /**
     * @var BannerRepository
     */
    protected $model;
    /**
     * @var ListingRepository
     */
    protected $listing;
    /**
     * @var string
     */
    protected $signature = 'rws:banner-property-count';
    /**
     * @var string
     */
    protected $description = 'Generates counts of listings according to price count & city';

    /**
     * ListingPriceCount constructor.
     * @param BannerRepository $model
     * @param ListingRepository $listing
     */
    public function __construct(BannerRepository $model, ListingRepository $listing, LocationRepository $location)
    {
        parent::__construct();
        $this->model = $model;
        $this->listing = $listing;
        $this->location = $location;
    }

    /**
     * @var array
     */
    protected $maps = [
        'cities' => 'city_id',
        'zips' => 'zip_id',
        'counties' => 'county_id',
        'subdivisions' => 'subdivision_id'
    ];


    /*
     *  Changed it to raw queries because eloquent queries were very slow
     *  Generate count for price ranges and subdivisions
     *
     */
    public function handle()
    {
        $settings = settings('real-estate');
        $start_date = date('Y-m-d', strtotime($settings['data_age']));
        $end_date = date('Y-m-d');
        $banners = \DB::select("select * from real_estate_banners where template = 'single-col-block'");
        foreach ($banners as $index => $banner) {
            $properties = json_decode($banner->properties, true);
            $i = 0;
            $psql = "";
            $lsql = "select id from real_estate_locations where";
            $count = count($properties['locations']) - 1;
            foreach ($properties['locations'] as $key => $location) {
                $slugs = "'" . implode("','", $location) . "'";
                $type = str_replace('\\', "\\\\", get_class_by_location_type($key));
                if ($i < $count) {
                    $lsql .= " (locationable_type = '{$type}' and slug in ({$slugs})) and ";
                } else {
                    $lsql .= " (locationable_type = '{$type}' and slug in ({$slugs}))";
                }
                $i++;
            }
            $locations = collect(DB::select($lsql));
            $locations_ids = '';
            if ($locations) {
                $locations_ids = $locations->implode('id', ',');
            }

            if (isset($properties['attributes'])) {
                $psql = "select listing_id from real_estate_listing_properties where";
                $attribute_count = 0;
                foreach ($properties['attributes'] as $attribute => $arr_value) {
                    $values = implode("|", $arr_value);
                    if ($attribute_count < (count($properties['attributes']) - 1)) {
                        $psql .= " and (type LIKE '%{$attribute}%' and value REGEXP '{$values}' )";
                    } else {
                        $psql .= " (type LIKE '%{$attribute}%' and value REGEXP '{$values}' )";
                    }
                }
            }

            $priceSql = "SELECT ";
            $i = 0;
            $count = count($properties['prices']) - 1;
            foreach ($properties['prices'] as $price) {
                if ($i < $count) {
                    $priceSql .= " SUM(CASE WHEN system_price between {$price['min']} and {$price['max']} THEN 1 ELSE 0 END) AS '{$price['min']}-{$price['max']}',";
                } else {
                    $priceSql .= " SUM(CASE WHEN system_price >= {$price['min']} THEN 1 ELSE 0 END) AS '{$price['min']}-'
                                   FROM real_estate_listings
                                   where city_id in ($locations_ids) and input_date between '$start_date' and '$end_date'";
                }
                $i++;
            }

            if( $psql != ''){
                $priceSql .= " and id in ($psql)";
            }

            $banner_price_ranges = \DB::select($priceSql);
            foreach ($properties['prices'] as $key => $price) {
                $min = $price['min'];
                $max = $price['max'];
                $field = "$min-$max";
                $properties['prices'][$key]['count'] = $banner_price_ranges[0]->$field;
            }


            if (isset($properties['tabs'])) {
                // process tabs
                foreach ($properties['tabs'] as $tab_index => $tab) {
                    $tabPSql = '';
                    if (isset($tab['conditions'])) {
                        $tabPSql = "select listing_id from real_estate_listing_properties where";
                        $attribute_count = 0;
                        foreach ($tab['conditions'] as $condition) {
                            $attribute = $condition['property_type'];
                            $values = implode("|", $condition['values']);
                            if ($attribute_count < (count($tab['conditions']) - 1)) {
                                $tabPSql .= " and (type LIKE '%{$attribute}%' and value REGEXP '{$values}' )";
                            } else {
                                $tabPSql .= " (type LIKE '%{$attribute}%' and value REGEXP '{$values}' )";
                            }
                        }
                    }
                    if($psql != ''){
                        $psql .= " and listing_id in ($psql)";
                    }

                    $tabSql = '';
                    if (isset($tab['prices'])) {
                        $i = 0;
                        $count = count($tab['prices']) - 1;
                        $tabSql = "SELECT ";
                        foreach ($tab['prices'] as $price) {
                            if ($i < $count) {
                                $tabSql .= " SUM(CASE WHEN system_price between {$price['min']} and {$price['max']} THEN 1 ELSE 0 END) AS '{$price['min']}-{$price['max']}',";
                            } else {
                                $tabSql .= " SUM(CASE WHEN system_price >= {$price['min']} THEN 1 ELSE 0 END) AS '{$price['min']}-'
                                   FROM real_estate_listings
                                   where city_id in ($locations_ids) and input_date between '$start_date' and '$end_date'";
                            }
                            $i++;
                        }

                        if( $tabPSql != ''){
                            $tabSql .= " and id in ($tabPSql)";
                        }
                        $tab_ranges = \DB::select($tabSql);
                        foreach ($properties['tabs'][$tab_index]['prices'] as $key => $price) {
                            $min = $price['min'];
                            $max = $price['max'];
                            $field = "$min-$max";
                            $properties['tabs'][$tab_index]['prices'][$key]['count'] = $tab_ranges[0]->$field;
                        }
                    }
                    elseif (isset($tab['subdivisions'])) {
                        $tabSql .= " real_estate_locations.slug, real_estate_listings.subdivision_id, count(*) as count FROM real_estate_listings";
                        $joinSql .= " left join real_estate_locations on real_estate_locations.id = real_estate_listings.subdivision_id";
                        $tabSql .= $joinSql . " where " . $propertySql;
                        $tabSql .= " (input_date between '" . $start_date . "' and '" . $end_date . "') and city_id in ($lsql) group by real_estate_listings.subdivision_id";
                        $tab_ranges = \DB::select($tabSql);
                        $subdivisions = [];
                        foreach ($tab_ranges as $range) {
                            $subdivisions[$range->slug] = $range->count;
                        }
                        foreach ($properties['tabs'][$tab_index]['subdivisions'] as $s_key => $subdivision) {
                            $slug = $subdivision['slug'];
                            $properties['tabs'][$tab_index]['subdivisions'][$s_key]['count'] = $subdivisions[$slug];
                        }
                    }
                }
            }

            // save banner properties field
            Banner::where('id', $banner->id)->update(['properties' => json_encode($properties)]);
            $this->info("completed for Banner {$banner->title}");
        }
        $this->info("completed!");
    }
}


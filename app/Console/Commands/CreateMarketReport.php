<?php

namespace App\Console\Commands;

use DB;
use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\SchoolDistrict;
use Robust\RealEstate\Models\County;
use Robust\RealEstate\Models\Listing as Listings;
use Robust\RealEstate\Models\Zip;
use Robust\RealEstate\Models\Area;
use Robust\RealEstate\Models\HighSchool;
use Robust\RealEstate\Models\ElementarySchool;
use Robust\RealEstate\Models\MiddleSchool;
use Robust\RealEstate\Models\Grid;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Models\MarketReport;
use Robust\RealEstate\Helpers\MarketReportHelper;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CreateMarketReport extends Command
{
    protected $status = [];
    protected $fields = [];
    protected $settings = [];

    /**
     * Create market report for different locations
     * Example: rws:create-market-report --type=city --type=high_school
     *
     * @var string
     */
    protected $signature = 'rws:create-market-report {--type=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate market report for listings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // Note: This code will be fully changed so donot take reference of this code.

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $active = config('rws.data-field-mapping')['active'];
        $sold = config('rws.data-field-mapping')['sold'];

        $this->byGroupName = false;
        $this->status = [
            'sold'=> $sold,
            'active'=> $active
        ];
       

        $this->settings = config('rws.data');

        $location_types = $this->option('type', []);
        \DB::beginTransaction();
        try {

            $all_report_types = collect([
                'city' => ['city_id' => (new City())],
                'county' => ['county_id' => (new County())],
                'zip' => ['zip_id' => (new Zip())],
                'subdivision' =>  ['subdivision_id' => (new Subdivision())],
                'school_district' => ['school_district_id' => (new SchoolDistrict())],
                'high_school' =>  ['high_school_id' => (new HighSchool())],
                'area' =>  ['area_id' => (new Area())]
            ]);
            $report_types = [];
            foreach ($all_report_types as $key => $model) {
                $location = key($model);
                if (in_array($key, $location_types)) {
                    $report_types[$location] = $model[$location];
                }
            }
            
            $this->populateReports($report_types);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::info($e->getTraceAsString());
        }
    }

    /**
     * @param array $report_types
     */
    private function populateReports(array $report_types)
    {
        $active = $this->status['active'];
        $sold = $this->status['sold'];
        foreach ($report_types as $location => $model) {
            $this->fields = [
            "COUNT(*) as count",
            " {$location}",
            " SUM( IF(status = '{$active}', 1, 0)) AS active_count",
            " SUM( IF(status = '{$sold}', 1, 0)) AS sold_count",
            " SUM( IF(status = '{$sold}' AND YEAR(input_date)='" . (string)(date('Y') - 1) . "', 1, 0)) as sold_count_past_year",
            " SUM( IF(status = '{$sold}' AND YEAR(input_date)='" . (string)date('Y') . "', 1, 0)) as sold_count_this_year",
            " AVG( IF(status = '{$active}', system_price, NULL)) as avg_price_active",
            " AVG( IF(status = '{$sold}', system_price, NULL)) as avg_price_sold",
            " SUM( IF(status = '{$sold}' AND YEAR(input_date)='" . (string)(date('Y') - 1) . "', system_price, NULL)) as avg_price_sold_past_year",
            " SUM( IF(status = '{$sold}' AND YEAR(input_date)='" . (string)(date('Y')) . "', system_price, NULL)) as avg_price_sold_this_year",
            " AVG( IF(status = '{$sold}', days_on_mls, NULL)) as avg_days_on_mls",
            " SUM( IF(status = '{$sold}' AND YEAR(input_date)='" . (string)(date('Y') - 1) . "', days_on_mls, NULL)) as avg_days_on_mls_past_year",
            " SUM( IF(status = '{$sold}' AND YEAR(input_date)='" . (string)(date('Y')) . "', days_on_mls, NULL)) as avg_days_on_mls_this_year"
            ];

            $selectArr = ['id', 'name', 'slug'];
            if( $model->getTable() == 'real_estate_subdivisions'){
                if($this->byGroupName ){
                    $selectArr = ['id', 'group_name as name', 'group_slug as slug'];
                    return $model->query()
                        ->select($selectArr)
                        ->whereNotNull('group_name')
                        ->groupBy('group_name')
                        ->get();
                }
            }

            $collection = $model->query()
            ->select($selectArr)
            ->get();

            if(count($collection) <= 0) {
                $this->info("Complete Report Data Creation for {$location}");
                continue;
            }

            // Delete records for given location type
            DB::table('real_estate_market_reports')->where('reportable_type', get_class($collection->first()))->delete();
    
            if (get_class($collection->first()) == 'Robust\RealEstate\Models\Subdivision') {
                $this->subdivisionReport($collection, $location);
            }else{
                $this->locationReport($collection, $location);
            }

            $this->info("Complete Report Data Creation for {$location}");
        }
    }


    /**
     * @param Collection $collection
     * @param string $location 
     */
    private function locationReport($collection, $location){
        $active = $this->status['active'];
        $sold = $this->status['sold'];

        $listingArr = DB::table( 'real_estate_listings' )
            ->select( \DB::raw(implode(',', $this->fields)) )
            ->where( $this->settings["listings-price"]["field-to-compare"], $this->settings["listings-price"]["condition"], $this->settings["listings-price"]["min"] )
            ->groupBy( $location )
            ->get()
            ->keyBy( $location );
             

        foreach ($collection as $model) {
            $totalListings = isset($listingArr[$model->id]) ? $listingArr[$model->id]->count : null;
            $totalListingsActive = isset($listingArr[$model->id]) ? $listingArr[$model->id]->active_count : null;
            $totalListingsSold = isset($listingArr[$model->id]) ? $listingArr[$model->id]->sold_count : null;
            $totalSoldThisYear = isset($listingArr[$model->id]) ? $listingArr[$model->id]->sold_count_this_year : null;
            $totalSoldLastYear = isset($listingArr[$model->id]) ? $listingArr[$model->id]->sold_count_past_year : null;
            $averagePriceActive = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_active : null, 1, ".", "");
            $averagePriceSold = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_sold : null, 1, ".", "");
            $averagePriceSoldLastYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_sold_past_year : null, 1, ".", "");
            $averagePriceSoldThisYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_sold_this_year : null, 1, ".", "");
            $averageDaysOnMLS = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_days_on_mls : null, 1, ".", "");
            $averageDaysOnMLSLastYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_days_on_mls_past_year : null, 1, ".", "");
            $averageDaysOnMLSThisYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_days_on_mls_this_year : null, 1, ".", "");
            
            $median_price_active = $this->getMedian($location, $model->id, 'system_price', $active);
            $median_price_sold = $this->getMedian($location, $model->id, 'system_price', $sold);
            $median_price_sold_past_year = $this->getMedian($location, $model->id, 'system_price', $sold, date('Y') - 1);
            $median_price_sold_this_year = $this->getMedian($location, $model->id, 'system_price', $sold, date('Y'));
            $median_dos_sold = $this->getMedian($location, $model->id, 'days_on_mls', $sold);           

            \DB::table('real_estate_market_reports')->insert([
                'reportable_id' => $model->id,
                'slug' => $model->slug,
                'name' => $model->name,
                'reportable_type' => get_class($model),
                'total_listings' => $totalListings,
                'total_listings_active' => $totalListingsActive,
                'total_listings_sold' => $totalListingsSold,
                'total_listings_sold_this_year' => $totalSoldThisYear,
                'total_listings_sold_past_year' => $totalSoldLastYear,
                'average_price_active' => $averagePriceActive,
                'average_price_sold' => $averagePriceSold,
                'average_price_sold_past_year' => $averagePriceSoldLastYear,
                'average_price_sold_this_year' => $averagePriceSoldThisYear,
                'average_dos' => $averageDaysOnMLS,
                'average_dos_past_year' => $averageDaysOnMLSLastYear,
                'average_dos_this_year' => $averageDaysOnMLSThisYear,
                'median_dos' => $median_dos_sold,
                'median_price_active' => $median_price_active,
                'median_price_sold' => $median_price_sold,
                'median_price_sold_past_year' => $median_price_sold_past_year,
                'median_price_sold_this_year' => $median_price_sold_this_year,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        }

    }

     /**
     * @param Collection $collection
     * @param string $location 
     */
    private function subdivisionReport($collection, $location){
        $active = $this->status['active'];
        $sold = $this->status['sold'];        
        
        $part_count = floor(count($collection) / 25);
        $chunked = $collection->chunk($part_count);

        // It will be remove and refactored; Temporary fix
        $marketHelper = new MarketReportHelper();
        
        foreach ($chunked as $key => $chunked_collection) {

            if(!$this->byGroupName ){                
                $chunked_collection->load(['listings' => function ($relation) {                    
                    $relation->select(['status', 'system_price', 'days_on_mls', 'city_id', 'county_id', 'zip_id', 'subdivision_id', 'school_district_id', 'input_date']);
                }]);             
            } 
            foreach ($chunked_collection as $model) {                
                $listingArr = $model->listings()
                ->select( \DB::raw(implode(',', $this->fields)) )
                ->where( $this->settings["listings-price"]["field-to-compare"], $this->settings["listings-price"]["condition"], $this->settings["listings-price"]["min"] )
                ->groupBy( $location )
                ->get()
                ->keyBy( $location );

                $totalListings = isset($listingArr[$model->id]) ? $listingArr[$model->id]->count : null;
                $totalListingsActive = isset($listingArr[$model->id]) ? $listingArr[$model->id]->active_count : null;
                $totalListingsSold = isset($listingArr[$model->id]) ? $listingArr[$model->id]->sold_count : null;
                $totalSoldThisYear = isset($listingArr[$model->id]) ? $listingArr[$model->id]->sold_count_this_year : null;
                $totalSoldLastYear = isset($listingArr[$model->id]) ? $listingArr[$model->id]->sold_count_past_year : null;
                $averagePriceActive = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_active : null, 1, ".", "");
                $averagePriceSold = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_sold : null, 1, ".", "");
                $averagePriceSoldLastYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_sold_past_year : null, 1, ".", "");
                $averagePriceSoldThisYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_price_sold_this_year : null, 1, ".", "");
                $averageDaysOnMLS = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_days_on_mls : null, 1, ".", "");
                $averageDaysOnMLSLastYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_days_on_mls_past_year : null, 1, ".", "");
                $averageDaysOnMLSThisYear = number_format(isset($listingArr[$model->id]) ? $listingArr[$model->id]->avg_days_on_mls_this_year : null, 1, ".", "");
                
                $median_price_active = $this->getMedian($location, $model->id, 'system_price', $active);
                $median_price_sold = $this->getMedian($location, $model->id, 'system_price', $sold);
                $median_price_sold_past_year = $this->getMedian($location, $model->id, 'system_price', $sold, date('Y') - 1);
                $median_price_sold_this_year = $this->getMedian($location, $model->id, 'system_price', $sold, date('Y'));
                $median_dos_sold = $this->getMedian($location, $model->id, 'days_on_mls', $sold);

                $report = \DB::table('real_estate_market_reports')->insert([
                   'reportable_id' => $model->id,
                    'slug' => $model->slug,
                    'name' => $model->name,
                    'reportable_type' => get_class($model),
                    'total_listings' => $totalListings,
                    'total_listings_active' => $totalListingsActive,
                    'total_listings_sold' => $totalListingsSold,
                    'total_listings_sold_this_year' => $totalSoldThisYear,
                    'total_listings_sold_past_year' => $totalSoldLastYear,
                    'average_price_active' => $averagePriceActive,
                    'average_price_sold' => $averagePriceSold,
                    'average_price_sold_past_year' => $averagePriceSoldLastYear,
                    'average_price_sold_this_year' => $averagePriceSoldThisYear,
                    'average_dos' => $averageDaysOnMLS,
                    'average_dos_past_year' => $averageDaysOnMLSLastYear,
                    'average_dos_this_year' => $averageDaysOnMLSThisYear,
                    'median_dos' => $median_dos_sold,
                    'median_price_active' => $median_price_active,
                    'median_price_sold' => $median_price_sold,
                    'median_price_sold_past_year' => $median_price_sold_past_year,
                    'median_price_sold_this_year' => $median_price_sold_this_year,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }


    /**
     * @param string $location_type
     * @param integer $location_value
     * @param string $field 
     */
    private function getMedian($location_type, $location_value, $field, $status = 'Active', $year = null)
    {
        $year_condition = "TRUE";

        if($year != null){
            $year_condition = "YEAR(input_date)='" . addslashes((string)$year) . "'";
        }
            
               
        $query_str = "SELECT AVG(t1.$field) AS median_val FROM 
                    (
                        SELECT $field, @rownum:=@rownum+1 AS `row_number`, @total_rows:=@rownum
                        FROM real_estate_listings,  (SELECT @rownum:=0) r
                        WHERE {$location_type}={$location_value}
                        AND `status`='{$status}'
                        AND {$year_condition}
                        ORDER BY $field
                    ) AS t1
                    WHERE t1.row_number IN ( FLOOR((@total_rows+1)/2), FLOOR((@total_rows+2)/2) );";     
        

        $row = \DB::select($query_str)[0];
        return ($row->median_val == null)? 0 : $row->median_val;
    }
}

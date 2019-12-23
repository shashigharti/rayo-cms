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
    protected $description = 'Save to database the main reports data ( model_id , model_type , total_listings, total_listings_active , total_listings_sold , median_price_active , median_price_sold , average_price_active , average_price_sold , average_dos , median_dos )';

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
        $this->byGroupName = false;
        $this->status = [
            'sold'=>'Closed',
            'active'=>'Active'
        ];
        $location_types = $this->option('type', []);
        \DB::beginTransaction();
        try {

            $all_report_types = collect([
                'city' => ['city_id' => (new City())],
                'county' => ['county_id' => (new County())],
                'zip' => ['zip_id' => (new Zip())],
                'subdivision' =>  ['subdivision_id' => (new Subdivision())],
                'school_district' => ['district_id' => (new SchoolDistrict())],
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
        foreach ($report_types as $location => $model) {
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
                continue;
            }

            if (get_class($collection->first()) == 'Robust\RealEstate\Models\Subdivision') {
                $this->subdivisionReport($collection);
            }else{
                $this->locationReport($collection, $location);
            }
             $this->info("Complete Report Data Creation for {$location}");
        }
    }

    /**
     * @param Model $model
     * @return Collection
     * @return reportable model with listings
     */
    private function getDataWithListings(Model $model): Collection
    {
        $selectArr = ['id', 'name', 'slug'];
        if( $model->getTable() == 'real_estate_subdivisions'){
            if($this->byGroupName){
                $selectArr = ['id', 'group_name as name', 'group_slug as slug'];
                return $model->query()
                    ->select($selectArr)
                    ->whereNotNull('group_name')
                    ->groupBy('group_name')
                    ->get();
            }
        }

        return $model->query()
            ->select($selectArr)
            ->get();

    }

    /**
     * @param Collection $collection
     * @param string $location 
     */
    private function locationReport($collection, $location){
        $settings = config('rws.data');
        $active = $this->status['active'];
        $sold = $this->status['sold'];

        // Delete records for given location type
        DB::table('real_estate_market_reports')->where('reportable_type', get_class($collection->first()))->delete();
        
        $fields = [
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

        $listingArr = DB::table('real_estate_listings')
            ->select(\DB::raw(implode(',', $fields)))
            ->where( $settings["listings-price"]["field-to-compare"], $settings["listings-price"]["condition"], $settings["listings-price"]["min"] )
            ->groupBy($location)
            ->get()
            ->keyBy($location);

        foreach ($collection as $model) {
            $totalListings = isset($listingArr[$model->name]) ? $listingArr[$model->name]->count : null;
            $totalListingsActive = isset($listingArr[$model->name]) ? $listingArr[$model->name]->active_count : null;
            $totalListingsSold = isset($listingArr[$model->name]) ? $listingArr[$model->name]->sold_count : null;
            $totalSoldThisYear = isset($listingArr[$model->name]) ? $listingArr[$model->name]->sold_count_this_year : null;
            $totalSoldLastYear = isset($listingArr[$model->name]) ? $listingArr[$model->name]->sold_count_past_year : null;
            $averagePriceActive = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_price_active : null, 1, ".", "");
            $averagePriceSold = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_price_sold : null, 1, ".", "");
            $averagePriceSoldLastYear = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_price_sold_past_year : null, 1, ".", "");
            $averagePriceSoldThisYear = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_price_sold_this_year : null, 1, ".", "");
            $averageDaysOnMLS = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_days_on_mls : null, 1, ".", "");
            $averageDaysOnMLSLastYear = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_days_on_mls_past_year : null, 1, ".", "");
            $averageDaysOnMLSThisYear = number_format(isset($listingArr[$model->name]) ? $listingArr[$model->name]->avg_days_on_mls_this_year : null, 1, ".", "");
            $median_price_active = 0;//$this->getMedian($location, $model->name, 'system_price', true);
            $median_price_sold = 0;//$this->getMedian($location, $model->name, 'system_price', false);
            $median_price_sold_past_year = 0;//$this->getMedian($location, $model->name, 'system_price', false, date('Y') - 1);
            $median_price_sold_this_year = 0;//$this->getMedian($location, $model->name, 'system_price', false, date('Y'));
            $median_dos_sold = 0;//$this->getMedian($location, $model->name, 'days_on_mls', false);

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
    private function subdivisionReport($collection){
        $part_count = floor(count($collection) / 25);
        $chunked = $collection->chunk($part_count);

        // It will be remove and refactored; Temporary fix
        $marketHelper = new MarketReportHelper();

        foreach ($chunked as $key => $chunked_collection) {

            if(!$this->byGroupName ){
                $chunked_collection->load(['listings' => function ($relation) {
                    $relation->select(['status', 'system_price', 'days_on_mls', 'city', 'county', 'zip', 'subdivision', 'district', 'input_date']);
                }]);
            }

            foreach ($chunked_collection as $model) {
                $listingArr = $model->listings;
                if($this->byGroupName){
                    $subdivisionList = [];
                    $subDivNames = Subdivision::query()->select(['name'])->where('group_name' ,$model->name)->get();
                    foreach($subDivNames as $subdivision){
                        $subdivisionList[] = $subdivision->name;
                    }

                    $listingArr = Listings::query()
                                ->whereIn('subdivision', $subdivisionList)
                                ->select(['status', 'system_price', 'days_on_mls', 'city', 'county', 'zip', 'subdivision', 'district', 'input_date'])
                                ->get();
                }
                $totalListingsActive = $marketHelper->countActive($listingArr, 'Active');
                $averagePriceActive = $marketHelper->countAvgActive($listingArr, 'Active', 'system_price');

                $report = \DB::table('real_estate_market_reports')->insert([
                    'reportable_id' => $model->id,
                    'slug' => $model->slug,
                    'name' => $model->name,
                    'reportable_type' => get_class($model),
                    'total_listings' => 0,
                    'total_listings_active' => $totalListingsActive,
                    'total_listings_sold' => 0,
                    'total_listings_sold_this_year' => 0,
                    'total_listings_sold_past_year' => 0,
                    'average_price_active' => $averagePriceActive,
                    'average_price_sold' => 0,
                    'average_price_sold_past_year' => 0,
                    'average_price_sold_this_year' => 0,
                    'average_dos' => 0,
                    'average_dos_past_year' => 0,
                    'average_dos_this_year' => 0,
                    'median_dos' => 0,
                    'median_price_active' => 0,
                    'median_price_sold' => 0,
                    'median_price_sold_past_year' => 0,
                    'median_price_sold_this_year' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}

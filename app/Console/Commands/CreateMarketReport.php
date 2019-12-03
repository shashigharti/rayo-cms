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
use Robust\RealEstate\Models\ElemSchool;
use Robust\RealEstate\Models\MiddleSchool;
use Robust\RealEstate\Models\Grid;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Models\MarketReport;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CreateMarketReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:create-market-report {--type=*}';//Example: rws:create-market-report --type=city --type=high_school

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {

            $report_types = $this->getReportTypes();
            $this->populateReports($report_types);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::info($e->getTraceAsString());
        }
    }

    /**
     * @return array
     * returns reportable models
     */
    private function getReportTypes(): array
    {
        $common_report_types = [
            'city' => (new City()),
            'county' => (new County()),
            'zip' => (new Zip()),
            'subdivision' => (new Subdivision()),
            'district' => (new SchoolDistrict()),
            'high_school' => (new HighSchool()),
            'area' => (new Area()),
        ];
        if (count($this->option('type', []))) {
            $filtered_report_types = [];
            foreach ($common_report_types as $type => $model) {
                if (in_array($type, $this->option('type', []))) {
                    $filtered_report_types[$type] = $model;
                }
            }
            return $filtered_report_types;
        }
        return $common_report_types;
    }

    /**
     * @param array $report_types
     */
    private function populateReports(array $report_types)
    {
    
        foreach ($report_types as $attr => $model) {
            
            $collection = $this->getDataWithListings($model);
            if(count($collection) <= 0) {
                continue;
            }

            $this->info("Starting: " . $model->getTable());

            MarketReport::where('reportable_type', $model->getMorphClass())->delete();
           
            $bar = $this->output->createProgressBar(count($collection));
            
            $this->populateReportByType($collection, $attr, $bar);
        }
    }

    /**
     * @param Model $model
     * @return Collection
     * returns reportable model with listings
     */
    private function getDataWithListings(Model $model): Collection
    {
        $selectArr = ['id', 'name', 'slug'];
        if( $model->getTable() == 'subdivisions'){
            if(Client::get()->isFindSubdivisionsByGroupName()){
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
     * @param $bar
     * Populates report for given reportable model
     */
    private function populateReportByType(Collection $collection, $attr, $bar)
    {
        if (get_class($collection->first()) == 'Robust\RealEstate\Models\Subdivision') {
            $part_count = floor(count($collection) / 25); 
            $chunked = $collection->chunk($part_count);
           
            foreach ($chunked as $key => $chunked_collection) {
                
                if(Client::get()->isFindSubdivisionsByGroupName()){

                    foreach ($chunked_collection as $model) {
 
                        $subdivisionList = [];
                        $subDivNames = Subdivision::query()->select(['name'])->where('group_name' ,$model->name)->get();
                        foreach($subDivNames as $subdivision){
                            $subdivisionList[] = $subdivision->name;
                        }
                      
                        $listingArr =   Listings::query()
                                        ->whereIn('listings.subdivision', $subdivisionList)
                                        ->select(['status', 'system_price', 'days_on_mls', 'city', 'county', 'zip', 'subdivision', 'district', 'input_date'])
                                        ->get();
                        
                        ReportsData::query()->insert([
                            'model_id' => $model->id,
                            'slug' => $model->slug,
                            'name' => $model->name,
                            'model_type' => get_class($model),
                            'total_listings' => count($listingArr),
                            'total_listings_active' => $listingArr->countActive(),
                            'total_listings_sold' => $listingArr->countSold(),
                            'total_listings_sold_past_year' => $listingArr->countSold(date('Y') - 1),
                            'total_listings_sold_this_year' => $listingArr->countSold(date('Y')),
                            'average_price_active' => number_format($listingArr->avgActive('system_price'), 1, ".", ""),
                            'average_price_sold' => number_format($listingArr->avgSold('system_price'), 1, ".", ""),
                            'average_price_sold_past_year' => number_format($listingArr->avgSold('system_price', date('Y') - 1), 1, ".", ""),
                            'average_price_sold_this_year' => number_format($listingArr->avgSold('system_price', date('Y')), 1, ".", ""),
                            'average_dos' => number_format($listingArr->avgSold('days_on_mls'), 1, ".", ""),
                            'average_dos_past_year' => number_format($listingArr->avgSold('days_on_mls', date('Y') - 1), 1, ".", ""),
                            'average_dos_this_year' => number_format($listingArr->avgSold('days_on_mls', date('Y')), 1, ".", ""),
                            'median_dos' => $listingArr->medianSold('days_on_mls'),
                            'median_price_active' => $listingArr->medianActive('system_price'),
                            'median_price_sold' => $listingArr->medianSold('system_price'),
                            'median_price_sold_past_year' => $listingArr->medianSold('system_price', date('Y') - 1),
                            'median_price_sold_this_year' => $listingArr->medianSold('system_price', date('Y')),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
    
                        $bar->advance();
    
                    }
                }else{
                    $chunked_collection->load(['listings' => function ($relation) {
                        $relation->select(['status', 'system_price', 'days_on_mls', 'city', 'county', 'zip', 'subdivision', 'district', 'input_date']);
                    }]);

                    foreach ($chunked_collection as $model) {
                        $listingArr = $model->listings;
                        ReportsData::query()->insert([
                            'model_id' => $model->id,
                            'slug' => $model->slug,
                            'name' => $model->name,
                            'model_type' => get_class($model),
                            'total_listings' => count($listingArr),
                            'total_listings_active' => $listingArr->countActive(),
                            'total_listings_sold' => $listingArr->countSold(),
                            'total_listings_sold_past_year' => $listingArr->countSold(date('Y') - 1),
                            'total_listings_sold_this_year' => $listingArr->countSold(date('Y')),
                            'average_price_active' => number_format($listingArr->avgActive('system_price'), 1, ".", ""),
                            'average_price_sold' => number_format($listingArr->avgSold('system_price'), 1, ".", ""),
                            'average_price_sold_past_year' => number_format($listingArr->avgSold('system_price', date('Y') - 1), 1, ".", ""),
                            'average_price_sold_this_year' => number_format($listingArr->avgSold('system_price', date('Y')), 1, ".", ""),
                            'average_dos' => number_format($listingArr->avgSold('days_on_mls'), 1, ".", ""),
                            'average_dos_past_year' => number_format($listingArr->avgSold('days_on_mls', date('Y') - 1), 1, ".", ""),
                            'average_dos_this_year' => number_format($listingArr->avgSold('days_on_mls', date('Y')), 1, ".", ""),
                            'median_dos' => $listingArr->medianSold('days_on_mls'),
                            'median_price_active' => $listingArr->medianActive('system_price'),
                            'median_price_sold' => $listingArr->medianSold('system_price'),
                            'median_price_sold_past_year' => $listingArr->medianSold('system_price', date('Y') - 1),
                            'median_price_sold_this_year' => $listingArr->medianSold('system_price', date('Y')),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
    
                        $bar->advance();
    
                    }
                }
            }
        } else {
            $listingArr = Listings::query()
                ->select([
                    'id',
                    $attr,
                    \DB::raw('COUNT(listings.id) as count'),
                    \DB::raw('SUM(IF(status="' . Client::get()->getActiveStatus() . '", 1, 0)) as active_count'),
                    \DB::raw('SUM(IF(status="' . Client::get()->getClosedStatus() . '", 1, 0)) as sold_count'),
                    \DB::raw('SUM(IF(status="' . Client::get()->getClosedStatus() . '" AND YEAR(input_date)="' . (string)(date('Y') - 1) . '", 1, 0)) as sold_count_past_year'),
                    \DB::raw('SUM(IF(status="' . Client::get()->getClosedStatus() . '" AND YEAR(input_date)="' . (string)date('Y') . '", 1, 0)) as sold_count_this_year'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getActiveStatus() . '", system_price, NULL)) as avg_price_active'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getClosedStatus() . '", system_price, NULL)) as avg_price_sold'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getClosedStatus() . '" AND YEAR(input_date)="' . (string)(date('Y') - 1) . '", system_price, NULL)) as avg_price_sold_past_year'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getClosedStatus() . '" AND YEAR(input_date)="' . (string)date('Y') . '", system_price, NULL)) as avg_price_sold_this_year'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getClosedStatus() . '", days_on_mls, NULL)) as avg_days_on_mls'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getClosedStatus() . '" AND YEAR(input_date)="' . (string)(date('Y') - 1) . '", days_on_mls, NULL)) as avg_days_on_mls_past_year'),
                    \DB::raw('AVG(IF(status="' . Client::get()->getClosedStatus() . '" AND YEAR(input_date)="' . (string)date('Y') . '", days_on_mls, NULL)) as avg_days_on_mls_this_year'),
                ])
                ->where('system_price','>=','50000')
                ->groupBy('listings.' . $attr)
                ->get()
                ->keyBy($attr);

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

                if($attr == LocationHelper::AREA && env('APP_CLIENT') == 'hawaii')
                {
                    // 1. Get standard name for area
                    $standardNameForArea = Client::get()->getLocationStandardName(LocationHelper::AREA, $model->name);
                    // 2. Now get all variants for the area
                    $allVariantsForArea = Client::get()->getLocationVariants(LocationHelper::AREA, $standardNameForArea);

                    // 3. Assign null as a start to all variables
                    $totalListings = $totalListingsActive = $totalListingsSold = $totalSoldThisYear = $totalSoldLastYear = $averagePriceActive = $averagePriceSold = $averagePriceSoldLastYear = $averagePriceSoldThisYear = $averageDaysOnMLS = $averageDaysOnMLSLastYear = $averageDaysOnMLSThisYear = null;

                    $validVariantsWithData = 0;

                    foreach ($allVariantsForArea as $key => $aVariant) {
                        $totalListings += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->count : null;
                        $totalListingsActive += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->active_count : null;
                        $totalListingsSold += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->sold_count : null;
                        $totalSoldThisYear += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->sold_count_this_year : null;
                        $totalSoldLastYear += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->sold_count_past_year : null;

                        $averagePriceActive += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_price_active : null;
                        $averagePriceSold += isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_price_sold : null;
                        $averagePriceSoldLastYear = isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_price_sold_past_year : null;
                        $averagePriceSoldThisYear = isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_price_sold_this_year : null;
                        $averageDaysOnMLS = isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_days_on_mls : null;
                        $averageDaysOnMLSLastYear = isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_days_on_mls_past_year : null;
                        $averageDaysOnMLSThisYear = isset($listingArr[$aVariant]) ? $listingArr[$aVariant]->avg_days_on_mls_this_year : null;

                        if(isset($listingArr[$aVariant]))
                        {
                            $validVariantsWithData++;
                        }
                    }

                    if($validVariantsWithData > 0)
                    {
                        $averagePriceActive = $averagePriceActive / $validVariantsWithData;
                        $averagePriceSold = $averagePriceSold / $validVariantsWithData;
                        $averagePriceSoldLastYear = $averagePriceSoldLastYear / $validVariantsWithData;
                        $averagePriceSoldThisYear = $averagePriceSoldThisYear / $validVariantsWithData;
                        $averageDaysOnMLS = $averageDaysOnMLS / $validVariantsWithData;
                        $averageDaysOnMLSLastYear = $averageDaysOnMLSLastYear  / $validVariantsWithData;
                        $averageDaysOnMLSThisYear = $averageDaysOnMLSThisYear / $validVariantsWithData;

                        $averagePriceActive = number_format($averagePriceActive, 1, ".", "");
                        $averagePriceSold = number_format($averagePriceSold, 1, ".", "");
                        $averagePriceSoldLastYear = number_format($averagePriceSoldLastYear, 1, ".", "");
                        $averagePriceSoldThisYear = number_format($averagePriceSoldThisYear, 1, ".", "");
                        $averageDaysOnMLS = number_format($averageDaysOnMLS, 1, ".", "");
                        $averageDaysOnMLSLastYear = number_format($averageDaysOnMLSLastYear, 1, ".", "");
                        $averageDaysOnMLSThisYear = number_format($averageDaysOnMLSThisYear, 1, ".", "");
                    }
                }

                $median_price_active = $this->getMedian($attr, $model->name, 'system_price', true);
                $median_price_sold = $this->getMedian($attr, $model->name, 'system_price', false);
                $median_price_sold_past_year = $this->getMedian($attr, $model->name, 'system_price', false, date('Y') - 1);
                $median_price_sold_this_year = $this->getMedian($attr, $model->name, 'system_price', false, date('Y'));
                $median_dos_sold = $this->getMedian($attr, $model->name, 'days_on_mls', false);

                ReportsData::query()->insert([
                    'model_id' => $model->id,
                    'slug' => $model->slug,
                    'name' => $model->name,
                    'model_type' => get_class($model),
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

                $bar->advance();

            }
        }
    }

    private function getMedian($type, $value, $attr, $active = true, $year = null)
    {
        if ($year) {
            $year_condition = "YEAR(input_date)='" . addslashes((string)$year) . "'";
        } else {
            $year_condition = "TRUE";
        }

        $fetched = \DB::select("SELECT AVG(t1.$attr) AS median_val FROM (
                                                        SELECT @rownum:=@rownum+1 AS `row_number`, $attr
                                                          FROM listings,  (SELECT @rownum:=0) r
                                                          WHERE $type='" . addslashes($value) . "' 
                                                          AND `status`" . (($active) ? "='Active'" : "!='Active'") . "
                                                          AND $year_condition
                                                          ORDER BY $attr
                                                        ) AS t1,
                                                        (
                                                          SELECT COUNT(*) AS total_rows
                                                          FROM listings
                                                          WHERE $type='" . addslashes($value) . "' 
                                                          AND status" . (($active) ? "='Active'" : "!='Active'") . "
                                                          AND $year_condition
                                                        ) AS t2
                                                        WHERE 1
                                                        AND t1.row_number IN ( FLOOR((total_rows+1)/2), FLOOR((total_rows+2)/2) );");
        if (isset($fetched[0]->median_val)) {
            return $fetched[0]->median_val;
        }
        return null;
    }
}

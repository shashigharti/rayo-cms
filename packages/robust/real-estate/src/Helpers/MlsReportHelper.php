<?php


namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\Area;
use Robust\RealEstate\Models\County;
use Robust\RealEstate\Models\HighSchool;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\MarketReport;
use Robust\RealEstate\Models\SchoolDistrict;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Models\Zip;

/**
 * Class MlsReportHelper
 * @package Robust\Mls\Helpers
 */
class MlsReportHelper
{
    /**
     * @var Area|City|County|HighSchool|SchoolDistrict|Subdivision|Zip
     */
    protected $city,$county,$zip,$subdivision,$schoolDistrict,$highSchool,$area,$marketReport,$listing;
    /**
     * @var array
     */
    protected $keys = [
        'city' => 'city',
        'county' => 'county',
        'subdivision'=> 'subdivision',
        'zip'=> 'zip',
        'school_district' => 'schoolDistrict',
        'high_school' => 'highSchool',
        'area'=>'area'
    ];

    public function __construct
    (
      City $city,County $county,Zip $zip,Subdivision $subdivision,
      SchoolDistrict $schoolDistrict,HighSchool $highSchool,Area $area,
      MarketReport $marketReport,Listing $listing
    )
    {
        $this->city = $city;
        $this->county=$county;
        $this->zip = $zip;
        $this->subdivision=$subdivision;
        $this->schoolDistrict=$schoolDistrict;
        $this->highSchool=$highSchool;
        $this->area=$area;
        $this->marketReport =$marketReport;
        $this->listing = $listing;
    }

    /**
     * @param $types
     * @return array
     */
    public function getReportTypes($types)
    {
      $report_types=[];
      foreach ($types as $type)
      {
         $report_types[$type] =  $this->keys[$type];
      }
      return $report_types;
    }

    public function getQuery($model)
    {
        $select = ['id','name','slug'];
        if($model === 'subdivision')
        {
            //group condition to be applied here
            return $this->$model->select($select);
        }
        return $this->$model->select($select);
    }

    public function getMorphClass($model)
    {
        return $this->$model->getMorphClass();
    }

    public function removeData($model_type)
    {
        $this->marketReport->where('model_type',$model_type)->delete();
    }

    public function getListing($attr)
    {
        //Should make it dynamic according to client
       $active = 'Active';
       $closed = 'Sold';
       $minPrice = '50000';
       $select = [
           $attr,
           \DB::raw('COUNT(listings.id) as count'),
           \DB::raw('SUM(IF(status="' . $active . '", 1, 0)) as active_count'),
           \DB::raw('SUM(IF(status="' . $closed . '", 1, 0)) as sold_count'),
           \DB::raw('SUM(IF(status="' . $closed . '" AND YEAR(input_date)="' . (string)(date('Y') - 1) . '", 1, 0)) as sold_count_past_year'),
           \DB::raw('SUM(IF(status="' . $closed . '" AND YEAR(input_date)="' . (string)date('Y') . '", 1, 0)) as sold_count_this_year'),
           \DB::raw('AVG(IF(status="' . $active  . '", system_price, NULL)) as avg_price_active'),
           \DB::raw('AVG(IF(status="' . $closed . '", system_price, NULL)) as avg_price_sold'),
           \DB::raw('AVG(IF(status="' . $closed . '" AND YEAR(input_date)="' . (string)(date('Y') - 1) . '", system_price, NULL)) as avg_price_sold_past_year'),
           \DB::raw('AVG(IF(status="' . $closed . '" AND YEAR(input_date)="' . (string)date('Y') . '", system_price, NULL)) as avg_price_sold_this_year'),
           \DB::raw('AVG(IF(status="' . $closed . '", days_on_mls, NULL)) as avg_days_on_mls'),
           \DB::raw('AVG(IF(status="' . $closed . '" AND YEAR(input_date)="' . (string)(date('Y') - 1) . '", days_on_mls, NULL)) as avg_days_on_mls_past_year'),
           \DB::raw('AVG(IF(status="' . $closed . '" AND YEAR(input_date)="' . (string)date('Y') . '", days_on_mls, NULL)) as avg_days_on_mls_this_year'),
       ];
       return $this->listing->select($select)
           ->where('system_price','>=',$minPrice)
           ->groupBy('listings.'.$attr)
           ->get()
           ->keyBy($attr);
    }

    public function getReportData($listings,$name)
    {
        return [
            'total_listings' =>
                isset($listings[$name]) ? $listings[$name]->count : null,
            'total_listings_active' =>
                isset($listings[$name]) ? $listings[$name]->active_count : null,
            'total_listings_sold' =>
                isset($listings[$name]) ? $listings[$name]->sold_count : null,
            'total_listings_sold_this_year' =>
                isset($listings[$name]) ? $listings[$name]->sold_count_this_year : null,
            'total_listings_sold_past_year' =>
                isset($listings[$name]) ? $listings[$name]->sold_count_past_year : null,
            'average_price_active' =>
                number_format(isset($listings[$name]) ? $listings[$name]->avg_price_active : null, 1, ".", ""),
            'average_price_sold' =>
                number_format(isset($listings[$name]) ? $listings[$name]->avg_price_sold : null, 1, ".", ""),
            'average_price_sold_past_year' =>
                number_format(isset($listings[$name]) ? $listings[$name]->avg_price_sold_past_year : null, 1, ".", ""),
            'average_price_sold_this_year' =>
                number_format(isset($listings[$name]) ? $listings[$name]->avg_price_sold_this_year : null, 1, ".", ""),
            'average_dos' =>
                number_format(isset($listings[$name]) ? $listings[$name]->avg_days_on_mls : null, 1, ".", ""),
            'average_dos_past_year' =>
                number_format(isset($listings[$name]) ? $listings[$name]->avg_days_on_mls : null, 1, ".", ""),
            'average_dos_this_year' =>
                isset($listings[$name]) ? $listings[$name]->sold_count_past_year : null
        ];
    }

    public function getSubDivisionReportData()
    {
        return [
            'total_listings' =>
                $this->subdivision->listings()->count(),
            'total_listings_active' =>
                $this->subdivision->listings()->where('status','Active')->count(),
            'total_listings_sold' =>
                $this->subdivision->listings()->where('status','Sold')->count(),
            'total_listings_sold_past_year' =>
                $this->subdivision->listings()->where('input_date','<',date('Y'))->where('status','Sold')->count(),
            'total_listings_sold_this_year' =>
                $this->subdivision->listings()->where('input_date','=',date('Y'))->where('status','Sold')->count(),
        ];
    }
    public function getMedian($type,$value,$attr,$active=true,$year=null)
    {
        $year_condition = "TRUE";
        if($year){
            $year_condition = "YEAR(input_date)='" . addslashes((string)$year) . "'";
        }
        $sql = "SELECT AVG(t1.$attr) AS median_val FROM (
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
                AND t1.row_number IN ( FLOOR((total_rows+1)/2), FLOOR((total_rows+2)/2) );";
        $result = \DB::select($sql);
        if(isset($result[0]->median_val)){
            return $result[0]->median_val;
        }
        return null;
    }

    public function createReport($data)
    {
        $this->marketReport->create($data);
    }


}

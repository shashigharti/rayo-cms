<?php


namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\ElemSchool;
use Robust\RealEstate\Models\Grid;
use Robust\RealEstate\Models\HighSchool;
use Robust\RealEstate\Models\MiddleSchool;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Models\Zip;
use Robust\RealEstate\Models\Area;
use Robust\RealEstate\Models\County;
use Robust\RealEstate\Models\SchoolDistrict;
use Robust\RealEstate\Models\Listing;
use Illuminate\Support\Str;

class LocationHelper
{


    protected $listing,$area,$city,$county,$subdivision,
        $grids,$zip,$highSchool,$elementarySchool,
        $middleSchool,$schoolDistrict;



    public function __construct(
        Listing $listing,Area $area,City $city,County $county,Subdivision $subdivision,
        Grid $grids,Zip $zip,HighSchool $highSchool,ElemSchool $elementarySchool,
        MiddleSchool $middleSchool,SchoolDistrict $schoolDistrict
    )
    {
        $this->listing = $listing;
        $this->area = $area;
        $this->city = $city;
        $this->subdivision = $subdivision;
        $this->grids = $grids;
        $this->zip = $zip;
        $this->highSchool = $highSchool;
        $this->elementarySchool = $elementarySchool;
        $this->middleSchool = $middleSchool;
        $this->schoolDistrict = $schoolDistrict;
        $this->county = $county;
    }

    /**
     * @param $attr
     * @return mixed
     */
    public function getCollection($attr)
    {
        return $this->listing->where($attr,'!=','')->where($attr,'!=',null)->groupBy($attr)->pluck($attr)->toArray();
    }

    /**
     * @param $attr
     * @param $collection
     * @return mixed
     */
    public function getActiveCount($attr, $collection)
    {
        return $this->listing->where($attr,$collection)->where('status','Active')->count();
    }

    /**
     * @param $attr
     * @param $collection
     * @return mixed
     */
    public function getSoldCount($attr, $collection)
    {
        return $this->listing->where($attr,$collection)->where('status','Sold')->count();
    }

    /**
     * @param $attr
     * @param $collection
     * @return mixed
     */
    public function getCityId($attr, $collection)
    {
        $result = $this->listing->select('city')->where('city','!=','')->where('city','!=',null)->where($attr,$collection)->first();
        return $this->city->where('slug',Str::slug($result->city,'-'))->first()->id;
    }

    /**
     * @param $attr
     * @param $collection
     * @return mixed
     */
    public function getCountyId($attr, $collection)
    {
        $result = $this->listing->select('county')->where('county','!=','')->where('county','!=',null)->where($attr,$collection)->first();
        return $this->county->where('slug',Str::slug($result->county,'-'))->first()->id;
    }

    /**
     * @param $attr
     * @param $collection
     * @return mixed
     */
    public function getZipId($attr, $collection)
    {
        $result = $this->listing->select('zip')->where('zip','!=','')->where('zip','!=',null)->where($attr,$collection)->first();
        return $this->zip->where('slug',Str::slug($result->zip,'-'))->first()->id;
    }


    /**
     * @param $data
     * @param $key
     * @return mixed
     */
    public function updateorcreate($data, $key)
    {
        return $this->$key->updateOrCreate(['slug'=>$data['slug']],$data);
    }
}

<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Listing;


/**
 * Class ListingRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;
    /**
     *
     */
    protected const LISTING_FIELDS = [
        'index' => [
            'id','uid','listing_slug','system_price','picture_count',
            'status','address_street','state','city',
            'county','year_built','total_finished_area',
            'baths_full','bedrooms'
        ]
    ];

    /**
     * @var Listing
     */
    protected $model;

    /**
     * ListingRepository constructor.
     * @param Listing $model
     */
    public function __construct(Listing $model)
    {
        $this->model = $model;
    }


    /**
     * @param null $status
     * @return mixed
     */
    public function getListing($status = null)
    {
        $result = $this->model->where('picture_count','>',0)
            ->select(ListingRepository::LISTING_FIELDS['index'])
            ->orderBy('input_date','desc')
            ->where('picture_count','>',0);
        if($status) {
            $result = $result->where('status',$status);
        }
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSingle($id)
    {
        return $this->model->where('id',$id)->with('details')->with('images')->first();
    }

    /**
     * @param $type
     * @param $name
     * @param $count
     * @return mixed
     */
    public function getListingByType($type, $name, $count)
    {
       return  $this->model->where($type,$name)
                ->select('id','listing_name','system_price','listing_slug')
                ->where('status','Active')
                ->where('picture_count','>',0)
                ->orderBy('input_date','asc')
                ->limit($count);
    }

    /**
     * @param $type
     * @param $location
     * @param $price
     * @return mixed
     */
    public function getListingByPrice($type, $location, $price)
    {
        $prices = $prices = explode('-',$price);
        return $this->model
            ->where($type,$location)
            ->whereBetween('system_price',$prices)
            ->where('picture_count','>',0)
            ->orderBy('input_date','desc');
    }


    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    public function getCountByType($type, $value)
    {
        return $this->model->where($type,$value)
            ->where('status','Active')
            ->where('picture_count','>',0);
    }

    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    public function getImageByType($type, $value)
    {
        return $this->model
            ->where($type,$value)
            ->where('picture_count','>',0);
    }
}

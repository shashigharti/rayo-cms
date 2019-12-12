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
            'real_estate_listings.id','real_estate_listings.uid','real_estate_listings.slug',
            'real_estate_listings.system_price','real_estate_listings.picture_count',
            'real_estate_listings.status','real_estate_listings.address_street','state',
            'real_estate_listings.baths_full','real_estate_listings.bedrooms'
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
     * @param $id
     * @return mixed
     */
    public function getSingle($id)
    {
        return $this->model->where('id',$id)->with('property')->with('images')->first();
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
                ->select('id','name','system_price','slug')
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
            ->where('status','Active')
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

    public function getListingBySearch($data)
    {
        $model = $this->model;
        if(isset($data['search']) && $data['search'] != '')
        {
            $model = $model->where('listing_name','LIKE',"%{$data['search']}%");
        }
        if(isset($data['type']) && !empty($data['type']))
        {
            $model =$model->whereIn('class',$data['type']);
        }

        if(isset($data['status']) && !empty($data['status']))
        {
            $model =$model->whereIn('status',$data['status']);
        }
        if(isset($data['pictures_only']) && !empty($data['pictures_only']))
        {
            $model =$model->where('picture_count','>',0);
        }
        if(isset($data['cities']) && !empty($data['cities']))
        {
            $model =$model->whereIn('city_id',$data['cities']);
        }
        if(isset($data['zip']) && !empty($data['zip']))
        {
            $model =$model->whereIn('zip_id',$data['zip']);
        }
        if(isset($data['price_min']) && !empty($data['price_min']))
        {
            $model =$model->where('system_price','>=',$data['price_min']);
        }
        if(isset($data['price_max']) && !empty($data['price_max']))
        {
            $model =$model->where('system_price','<=',$data['price_max']);
        }
        if(isset($data['beds_min']) && !empty($data['beds_min']))
        {
            $model =$model->where('bedrooms','>=',$data['beds_min']);
        }
        if(isset($data['beds_max']) && !empty($data['beds_max']))
        {
            $model =$model->where('bedrooms','<=',$data['beds_max']);
        }
        if(isset($data['bathrooms_min']) && !empty($data['bathrooms_min']))
        {
            $model =$model->where('baths_full','>=',$data['bathrooms_min']);
        }
        if(isset($data['bathrooms_max']) && !empty($data['bathrooms_max']))
        {
            $model =$model->where('baths_full','<=',$data['bathrooms_max']);
        }
        if(isset($data['subdivision']) && $data['subdivision'] != '')
        {
            $model = $model->where('subdivision_id','LIKE',"%{$data['subdivision']}%");
        }
        if(isset($data['acres_min']) && !empty($data['acres_min']))
        {
            $model =$model->where('acres','>=',$data['acres_min']);
        }
        if(isset($data['acres_max']) && !empty($data['acres_max']))
        {
            $model =$model->where('acres','<=',$data['acres_max']);
        }
        if(isset($data['square_min']) && !empty($data['square_min']))
        {
            $model =$model->where('total_finished_area','>=',$data['square_min']);
        }
        if(isset($data['square_max']) && !empty($data['square_max']))
        {
            $model =$model->where('total_finished_area','<=',$data['square_max']);
        }
        if(isset($data['year_min']) && !empty($data['year_min']))
        {
            $model =$model->where('year_build','>=',$data['year_min']);
        }
        if(isset($data['year_max']) && !empty($data['year_max']))
        {
            $model =$model->where('year_build','<=',$data['year_max']);
        }

        return $model;
    }

    public function getListings(){
        return $this->model
            ->select(ListingRepository::LISTING_FIELDS['index'])
            ->leftJoin('real_estate_listing_properties', 'real_estate_listings.id', '=', 'real_estate_listing_properties.listing_id')
            ->paginate(40);
    }
}

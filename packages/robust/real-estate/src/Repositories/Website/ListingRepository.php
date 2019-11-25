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
            'id','listing_slug','system_price','picture_count',
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
            ->has('image','>',0)
            ->with('image');
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
}

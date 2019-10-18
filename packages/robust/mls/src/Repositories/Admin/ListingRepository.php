<?php
namespace Robust\Mls\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Mls\Models\Listing;


/**
 * Class ListingRepository
 * @package Robust\Mls\Repositories\Admin
 */
class ListingRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

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
     * @return mixed
     */
    public function getListingsWithoutCoordinates()
    {
       return $this->model->select('id','listing_name')
            ->where([
                'latitude' => 0,
                'longitude' => 0
            ])
            ->orderBy('status','desc')
            ->orderBy('input_date','desc');
    }
}
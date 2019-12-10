<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadFavourites;


/**
 * Class FavouriteRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class FavouriteRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var LeadFavourites
     */
    protected $model;


    /**
     * FavouriteRepository constructor.
     * @param LeadFavourites $model
     */
    public function __construct(LeadFavourites $model)
    {
        $this->model = $model;
    }

}
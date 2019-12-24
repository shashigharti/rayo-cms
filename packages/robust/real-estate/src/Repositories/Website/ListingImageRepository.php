<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\ListingImages;


/**
 * Class ListingImageRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingImageRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var ListingImages
     */
    protected $model;


    /**
     * ListingImageRepository constructor.
     * @param ListingImages $model
     */
    public function __construct(ListingImages $model)
    {
        $this->model = $model;
    }
}

//needs refactoring

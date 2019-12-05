<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Subdivision;


/**
 * Class SubdivisionRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class SubdivisionRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Subdivision
     */
    protected $model;


    /**
     * SubdivisionRepository constructor.
     * @param Subdivision $model
     */
    public function __construct(Subdivision $model)
    {
        $this->model = $model;
    }
}

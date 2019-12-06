<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Interior;


/**
 * Class InteriorRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class InteriorRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Interior
     */
    protected $model;


    /**
     * InteriorRepository constructor.
     * @param Interior $model
     */
    public function __construct(Interior $model)
    {
        $this->model = $model;
    }
}

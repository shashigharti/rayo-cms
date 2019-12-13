<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Attribute;


/**
 * Class AttributeRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class AttributeRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Attribute
     */
    protected $model;

    /**
     * AttributeRepository constructor.
     * @param Attribute $model
     */
    public function __construct(Attribute $model)
    {
        $this->model = $model;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->model->where('name',$name)->first();
    }
}

<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
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
     * @var Constant FIELDS_QUERY_MAP
     */
    protected const FIELDS_QUERY_MAP = [
        'property_name' => ['name' => 'property_name', 'condition' => 'LIKE'],
        'name' => ['name' => 'name', 'condition' => 'LIKE'],
        'id' => ['name' => 'id', 'condition' => '='],
        'status' => ['name' => 'status', 'condition' => '=']
    ];

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

    /**
     * @param $params
     * @return Eloquent Collection
     */
    public function getAttributes($params = [])
    {
        $qBuilder = $this->model;
        
        foreach($params as $key => $param){
            $qBuilder = $qBuilder->where(AttributeRepository::FIELDS_QUERY_MAP[$key]['name'], 
            AttributeRepository::FIELDS_QUERY_MAP[$key]['condition'],
            $param);
        }
        return $qBuilder->get();
    }
}

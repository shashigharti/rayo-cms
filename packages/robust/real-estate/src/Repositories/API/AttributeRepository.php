<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\RealEstate\Models\Attribute;

/**
 * Class AttributeRepository
 * @package Robust\RealEstate\Repositories\API
 */
class AttributeRepository
{
    /**
     * @var Attribute
     */
    protected $model;

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

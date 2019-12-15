<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\API\AttributeRepository;


/**
 * Class AttributeController
 * @package Robust\RealEstate\Controllers\API
 */
class AttributeController extends Controller
{

    /**
     * @var AttributeRepository
     */
    protected $model;   


    /**
     * AttributeController constructor.
     * @param AttributeRepository $model
     */
    public function __construct(AttributeRepository $model)
    {
        $this->model = $model;
    }
    
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAttributes($type)
    {
        $records = $this->model->getAttributes();
        return response()->json(['data' => $records]);
    }    

    /**
     * @param $params
     * @return Eloquent Collection
     */
    public function getAttributesListByPropertyName($property_name)
    {
        $record = $this->model->getAttributes(['property_name' => $property_name])->first();
        return response()->json(['data' => json_decode($record->values, true)]);
    }
}

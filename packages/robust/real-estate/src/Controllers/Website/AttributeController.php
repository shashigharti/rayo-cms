<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\AttributeRepository;


/**
 * Class AttributeController
 * @package Robust\RealEstate\Controllers\Website
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
     * @param $name
     * @return array|mixed
     */
    public function index($name)
    {
        $values = [];
        $model = $this->model->getByName($name);
        if($model){
            $values =  json_decode($model->values,true);
        }
        return response()->json(['data' => $values]);
    }
}

<?php

namespace Robust\Menus\Controllers\Api;


use App\Http\Controllers\Controller;
use Robust\Core\Models\Menu;


/**
 * Class CoreMenuController
 * @package Robust\Menus\Controllers\Api
 */
class CoreMenuController extends Controller
{
    /**
     * @var Menu
     */
    protected $model;

    /**
     * CoreMenuController constructor.
     * @param Menu $model
     */
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    /**
     * @param $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenusByPackage($type)
    {
        $result =  $this->model->where('package_name',$type)
                ->where('parent_id', 0)
                ->with('children', 'children.children')
                ->get();
        return response()->json(['data' => $result],200);
    }

}

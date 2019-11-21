<?php

namespace Robust\Menus\Controllers\Api;


use App\Http\Controllers\Controller;
use Robust\Core\Models\Menu;


class CoreMenuController extends Controller
{
    protected $model;
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function getMenusByPackage($type)
    {
        $result =  $this->model->where('package_name',$type)
                ->where('parent_id', 0)
                ->with('children', 'children.children')
                ->get();
        return response()->json(['data' => $result],200);
    }

}

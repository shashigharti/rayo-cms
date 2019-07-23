<?php

namespace App\Http\Controllers;


use App\Menu;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as MenuResource;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{

    public function getMenus(Menu $menu)
    {
        return MenuResource::collection($menu->where('type', 'main')->get());
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Resources\Menu $menu
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Menu $menu)
    {
        $data = $request->all();
        $rules = [
            "name" => "required"
        ];
        $this->validate($request,
            $rules
        );
        $store = $menu->create($data);
        dd($store);
    }
}

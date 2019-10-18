<?php

namespace Robust\Menus\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Menus\Models\Menu;
use Robust\Menus\Resources\Menu as MenuResource;


/**
 * Class MenuApiController
 * @package Robust\Menus\Controllers\Admin
 */
class MenuController extends Controller
{

    /**
     * @param \Robust\Menus\Models\Menu $menu
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Menu $menu)
    {
        return MenuResource::collection($menu->all());
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Menus\Models\Menu $menu
     * @return \Illuminate\Http\JsonResponse
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
        $menu->create($data);

        return response()->json(['message' => 'Success']);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @param \Robust\Menus\Models\Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id, Menu $menu)
    {
        $updated = $menu->find($id)->update($request->all());
        if ($updated) {
            return response()->json(['message' => 'success']);
        };
    }


    /**
     * @param $id
     * @param \Robust\Menus\Models\Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, Menu $menu)
    {
        $deleted = $menu->find($id)->delete();
        if ($deleted) {
            return response()->json(['message' => 'success']);
        };
    }
}

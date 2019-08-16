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

    /**
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getMenus(Menu $menu)
    {
        return MenuResource::collection($menu->where('type', 'main')->get());
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Menu $menu
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
        $store = $menu->create($data);
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
     * @param \App\Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Menu $menu)
    {
        $deleted = $menu->find($id)->delete();
        if ($deleted) {
            return response()->json(['message' => 'success']);
        };
    }
}

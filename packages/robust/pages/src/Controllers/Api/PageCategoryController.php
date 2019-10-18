<?php

namespace Robust\Pages\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Pages\Models\Category;
use Robust\Pages\Resources\Category as CategoryResource;


/**
 * Class PageCategoryApiController
 * @package Robust\Pages\Controllers\Admin
 */
class PageCategoryController extends Controller
{

    /**
     * @param \Robust\Pages\Models\Category $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Category $category)
    {
        return CategoryResource::collection($category->all());
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Pages\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Category $category)
    {
        $data = $request->all();
        $rules = [
            "name" => "required",
            "slug" => "required|unique:pages_categories",
            "description" => "required"
        ];
        $request->validate($rules);
        $category->create($data);

        return response()->json(['message' => 'Success']);
    }


    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Pages\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, Category $category)
    {
        $data = $request->all();
        $updated = $category->find($id)->update($data);

        if ($updated) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }
    }


    /**
     * @param $id
     * @param \Robust\Pages\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, Category $category)
    {
        $deleted = $category->find($id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }

    }
}

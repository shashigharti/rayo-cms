<?php

namespace App\Http\Controllers;

use App\PageCategory;
use Illuminate\Http\Request;
use App\Http\Resources\PageCategory as PageCategoryResource;

/**
 * Class PageCategoryController
 * @package App\Http\Controllers
 */
class PageCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\PageCategory $pageCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, PageCategory $pageCategory)
    {
        $data = $request->all();
        $rules = [
            "name" => "required",
            "slug" => "required| unique:pages_categories",
            "description" => "required"
        ];
        $request->validate($rules);
        $model = $pageCategory->create($data);

        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \App\PageCategory $pageCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, PageCategory $pageCategory)
    {
        $data = $request->all();
        $updated = $pageCategory->find($id)->update($data);

        if($updated) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }

    }

    /**
     * @param $id
     * @param \App\PageCategory $pageCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, PageCategory $pageCategory)
    {
        $deleted = $pageCategory->find($id)->delete();

        if($deleted) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }

    }

    /**
     * @param \App\PageCategory $pageCategory
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(PageCategory $pageCategory)
    {
        return PageCategoryResource::collection($pageCategory->all());
    }
}

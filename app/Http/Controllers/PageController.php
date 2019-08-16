<?php

namespace App\Http\Controllers;

use App\Http\Resources\Page as PageResource;
use App\Page;
use Illuminate\Http\Request;

/**
 * Class PageCategoryController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Page $page)
    {
        $data = $request->all();
        $rules = [
            "name" => "required",
            "slug" => "required| unique:pages",
            "category_id" => "required",
            "excerpt" => "max:250",
            "content" => "required"
        ];
        $request->validate($rules);
        $model = $page->create($data);

        return response()->json(['message' => 'Success']);
    }


    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, Page $page)
    {
        $data = $request->all();
        $updated = $page->find($id)->update($data);

        if ($updated) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }

    }


    /**
     * @param $id
     * @param \App\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Page $page)
    {
        $deleted = $page->find($id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }

    }

    /**
     * @param \App\Page $page
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Page $page)
    {
        return PageResource::collection($page->all());
    }

    /**
     * @param $id
     * @param \App\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus($id, Page $page)
    {
        $model = $page->find($id);
        $model->status = ($model->status == 0) ? 1 : 0;
        $model->save();
        return response()->json(['message', 'Successfully Updated!']);
    }
}

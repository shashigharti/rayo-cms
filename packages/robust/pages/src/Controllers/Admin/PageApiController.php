<?php
namespace Robust\Pages\Controllers\Admin;

use App\Http\Controllers\Controller;
use Mockery\Exception;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Core\Helpers\MenuHelper;
use Robust\Page\Requests\PageStoreRequest;
use Robust\Pages\Models\Page;
use Robust\Pages\Resources\Page as PageResource;

/**
 * Class PageController
 * @package Robust\Pages\Controllers\Admin
 */
class PageApiController extends Controller
{
    use CrudTrait, ViewTrait;


    /**
     * @param \Robust\Pages\Models\Page $page
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Page $page)
    {
        return PageResource::collection($page->paginate(10));
    }
    public function edit($id)
    {
        return new PageResource(Page::find($id));
    }
    /**
     * @param \Robust\Page\Requests\PageStoreRequest $request
     * @param \Robust\Pages\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PageStoreRequest $request, Page $page)
    {
        $validated = $request->all();
        $page->create($validated);
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Pages\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, Page $page)
    {
        $data = $request->all();
        dd($data);
        $updated = $page->find($id)->update($data);

        if ($updated) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }
    }

    /**
     * @param $id
     * @param \Robust\Pages\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, Page $page)
    {
        $deleted = $page->find($id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Failed']);
        }

    }
}

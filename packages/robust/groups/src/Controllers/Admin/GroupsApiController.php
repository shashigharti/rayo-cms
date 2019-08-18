<?php

namespace Robust\Groups\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Robust\Groups\Model\CoreGroup;
use Robust\Groups\Resources\CoreGroup as CoreGroupResource;


/**
 * Class GroupsApiController
 * @package Robust\Groups\Controllers\Admin
 */
class GroupsApiController extends Controller
{
    /**
     * @param \Robust\Groups\Model\CoreGroup $coreGroup
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(CoreGroup $coreGroup)
    {
        return CoreGroupResource::collection($coreGroup->all());
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Groups\Model\CoreGroup $coreGroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, CoreGroup $coreGroup)
    {
        try {
            $coreGroup->create($request->all());
        } catch (Exception $e) {
            if ($e->getCode() === "23000") {
                return response()->json([
                    'message' => 'Duplicate entry. Please use a different name / color.',
                    'class' => 'red darken-2'
                ]);
            }
        }

        return response()->json(['message' => 'Successfully Saved.', 'class' => '']);
    }

    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Groups\Model\CoreGroup $coreGroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, CoreGroup $coreGroup)
    {
        $dataToUpdate = $request->all();
        $coreGroup->find($id)->update($dataToUpdate);
        return response()->json(['message' => 'Successfully Updated']);
    }

    /**
     * @param $id
     * @param \Robust\Groups\Model\CoreGroup $coreGroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, CoreGroup $coreGroup)
    {
        try {
            $coreGroup->find($id)->delete();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Deleted failed',
                'class' => 'red darken-1',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json(['message' => 'Successfully deleted.', 'class' => '']);
    }
}

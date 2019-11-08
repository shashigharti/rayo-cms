<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Models\CoreEmailTemplate;
use Robust\RealEstate\Resources\CoreEmailTemplate as CoreEmailTemplateResource;
use Illuminate\Http\Request;


/**
 * Class EmailController
 * @package Robust\RealEstate\Controllers\Api
 */
class EmailController extends Controller
{

    /**
     * @param \Robust\Emails\Models\CoreEmailTemplate $coreEmailTemplate
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(CoreEmailTemplate $coreEmailTemplate)
    {
        return CoreEmailTemplateResource::collection($coreEmailTemplate->all());
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Emails\Models\CoreEmailTemplate $coreEmailTemplate
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, CoreEmailTemplate $coreEmailTemplate)
    {
        $coreEmailTemplate->create($request->all());
        return response()->json(['message' => 'Success']);
    }


    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Emails\Models\CoreEmailTemplate $coreEmailTemplate
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, CoreEmailTemplate $coreEmailTemplate)
    {
        $coreEmailTemplate->find($id)->update($request->all());
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @param \Robust\Emails\Models\CoreEmailTemplate $coreEmailTemplate
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, CoreEmailTemplate $coreEmailTemplate)
    {
        $coreEmailTemplate->find($id)->delete();
        return response()->json(["message" => "Success"]);
    }
}

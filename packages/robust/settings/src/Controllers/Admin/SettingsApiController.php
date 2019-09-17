<?php

namespace Robust\Settings\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Settings\Model\CoreSetting;
use Robust\Menus\Resources\CoreSetting as CoreSettingResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class SettingsApiController extends Controller
{
    /**
     * @param \Robust\Settings\Model\CoreSetting $coreSetting
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(CoreSetting $coreSetting)
    {
        return CoreSettingResource::collection($coreSetting->all()->keyBy('type'));
    }

    /**
     * @param $type
     * @param \Robust\Settings\Model\CoreSetting $coreSetting
     * @return \Robust\Menus\Resources\CoreSetting
     */
    public function getByType($type, CoreSetting $coreSetting)
    {
        return new CoreSettingResource($coreSetting->where('type', $type)->first());
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $type
     * @param \Robust\Settings\Model\CoreSetting $coreSetting
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $type, CoreSetting $coreSetting)
    {
        // Json encode the settings data
        $setting = json_encode($request->all(), true);

        // Creates new field if exists, else updates the existing one
        $coreSetting->updateOrCreate(
            ['type' => $type],
            ['values' => $setting]
        );
        return response()->json(['message' => 'Success']);
    }

}



<?php

namespace Robust\Landmarks\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Landmarks\Model\City;
use Robust\Landmarks\Resources\City as CityResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class CityApiController extends Controller
{
    /**
     * @param \Robust\Landmarks\Model\City $city
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(City $city)
    {
        return CityResource::collection(
            $city->where('navigation', '=', '0')
            ->where('dropdown', '!=', '1')
            ->orderBy('menu_order', 'asc')->get()
        );
    }
}



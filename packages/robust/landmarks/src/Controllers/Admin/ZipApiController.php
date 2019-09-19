<?php

namespace Robust\Landmarks\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Landmarks\Model\Zip;
use Robust\Landmarks\Resources\Zip as ZipResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class ZipApiController extends Controller
{

    /**
     * @param \Robust\Landmarks\Model\Zip $zip
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Zip $zip)
    {
        return ZipResource::collection(
            $zip->satisfying()->orderBy('menu_order', 'asc')->orderBy('name', 'asc')->orderBy('menu_order', 'asc')->get()
        );
    }
}



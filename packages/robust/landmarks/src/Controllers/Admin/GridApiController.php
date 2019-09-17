<?php

namespace Robust\Landmarks\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Landmarks\Model\Grid;
use Robust\Landmarks\Resources\Grid as GridResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class GridApiController extends Controller
{


    /**
     * @param \Robust\Landmarks\Model\Grid $grid
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Grid $grid)
    {
        return GridResource::collection(
            $grid->orderBy('name', 'asc')->get()
        );
    }
}



<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Landmarks\Models\Grid;
use Robust\Landmarks\Resources\Grid as GridResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class GridController extends Controller
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



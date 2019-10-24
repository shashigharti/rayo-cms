<?php

namespace Robust\Admin\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\Admin\Models\Permission;
use Robust\Admin\Resources\PermissionResource;

/**
 * Class PermissionController
 * @package Robust\Admin\Controllers\API
 */
class PermissionController extends Controller
{

    /**
     * @param Permission $permission
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Permission $permission)
    {
        return PermissionResource::collection($permission->get());
    }
}

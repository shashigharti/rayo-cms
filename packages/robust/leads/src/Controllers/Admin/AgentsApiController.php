<?php
namespace Robust\Leads\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Resources\User as UserResource;

/**
 * Class CategoryController
 * @package Robust\Pages\Controllers\Admin
 */
class AgentsApiController extends Controller
{

    /**
     * @param \App\User $user
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(User $user)
    {
        // Until roles & permissions are fixed, for now getting agents as users except id = 1,
        return UserResource::collection($user->where('id', '!=', 1)->paginate(10));
    }
}

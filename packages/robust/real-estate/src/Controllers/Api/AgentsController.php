<?php
namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Robust\Admin\Resources\UserResource;


/**
 * Class AgentsController
 * @package Robust\RealEstate\Controllers\Api
 */
class AgentsController extends Controller
{


    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        // Until roles & permissions are fixed, for now getting agents as users except id = 1,
        return UserResource::collection($user->where('id', '!=', 1)->paginate(10));
    }
}

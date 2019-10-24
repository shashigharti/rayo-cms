<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Robust\Admin\Models\User;
use Validator;
use App\Http\Resources\UserResource as UserResource;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */
class UserController extends Controller
{
    /**
     * @var int
     */
    public $successStatus = 200;

    /**
     * @var int
     */
    public $failedStatus = 500;

    /**
     * @param \App\User $userModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(User $userModel)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $user['token'] = $user->createToken('MyApp')->accessToken;

            // Update last active at field
            $userModel->where('email', request('email'))->update([
                'last_active_at' => Carbon::now()->format('Y-m-d h:i:s')
            ]);
            return response()->json(['success' => true, 'user' => $user], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        try {
            $user = User::create($input);
        } catch (Exception $e) {
            return response()->json(['code' => $e->getCode()], $this->failedStatus);
        }

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->first_name . ' ' . $user->last_name;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}

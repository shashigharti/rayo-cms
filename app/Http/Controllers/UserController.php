<?php

namespace App\Http\Controllers\API;


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

            $user = Auth::user()->with('roles.permissions')->first();
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['success'=>false,'errors' => $validator->errors()],422);
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        try {
            User::create($data);
            $user = Auth::attempt(['email' =>$data['email'],'password' => $data['c_password']]);
            $user = Auth::user()->with('roles.permissions')->first();

        } catch (Exception $e) {
            return response()->json(['success'=>'false','code' => $e->getCode()], $this->failedStatus);
        }

        $user['token'] = $user->createToken('MyApp')->accessToken;
        return response()->json(['success' => true, 'user' => $user], $this->successStatus);
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

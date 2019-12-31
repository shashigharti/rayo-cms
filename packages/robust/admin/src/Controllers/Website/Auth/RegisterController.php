<?php

namespace Robust\Admin\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Robust\Admin\Repositories\Website\RegisterRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * RegisterController constructor.
     * @param UserRepository $user
     */
    public function __construct(RegisterRepository $user, Request $request)
    {
        $this->middleware('guest');

        $this->model = $user;
        $this->request = $request;
        $this->events = [
            'create' => 'Robust\Admin\Events\UserCreatedEvent',
        ];
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'confirm_pass' => ['same:password']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {   
        // will be removed
        $lead = Lead::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name']
        ]);

        $member_details = [
            'user_name' => $data['email'],
            'email' => $data['email'],
            'memberable_id' => $lead->id,
            'memberable_type' => 'Robust\RealEstate\Models\Lead',
            'password' => Hash::make($data['password'])
        ];

        $new_user = $this->model->store($registration_details);       

        if ($new_user) {
            $event = $this->events['create'];

            // Raise user created event
            event(new $event($user));            
        }

        if (\Cache::get('redirect_url')) {
            return redirect(\Cache::get('redirect_url'));
        }

        return redirect()->route('verification.notice')
        ->with('message', 'A new verification email has been sent to your email. Please review it first before logging in.');
    }
}

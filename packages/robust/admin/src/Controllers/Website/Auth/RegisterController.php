<?php

namespace Robust\Admin\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Robust\Core\Notifications\LeadRegistrationNotification;
use Robust\Admin\Repositories\Website\UserRepository;
use Illuminate\Http\Request;

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
     * @param LeadRepository $lead
     */
    public function __construct(UserRepository $user, Request $request)
    {
        $this->middleware('guest');

        $this->model = $user;
        $this->request = $request;
        $this->events = [
            'user_created' => 'Robust\Admin\Events\UserCreatedEvent',
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
            'password' => ['required', 'string', 'min:5', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(Dashboard $dashboard, array $data)
    {   
        // create a user account
        $new_user = $this->user->create([
            'user_name' => $data['email'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]); 

        // create dashboard data for the new user
        $dashboard->create([
            'name' => "{$data['first_name']} Dashboard",
            'slug' => str_slug("{$data['first_name']} Dashboard"),
            'description' => 'Main Dashboard',
            'is_default' => true,
            'user_id' => $new_user->id
        ]);

        if ($new_user) {
            $config = config('rws.override_event_notifications');
            $event = $this->events['user_created'];

            // if overridding events does exists in configuration, raise that event.
            if(isset($config['user_created'])){
                $event = $config['user_created'];                  
            } 
            
            // Raise user created event
            event(new $event($user, $data));            
        }

        if (\Cache::get('redirect_url')) {
            return redirect(\Cache::get('redirect_url'));
        }

        return redirect()->route('verification.notice')
        ->with('message', 'A new verification email has been sent to your email. Please review it first before logging in.');
    }
}

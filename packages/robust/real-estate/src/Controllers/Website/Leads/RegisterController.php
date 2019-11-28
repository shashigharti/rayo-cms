<?php


namespace Robust\RealEstate\Controllers\Website\Leads;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Robust\Admin\Models\User;
use Robust\RealEstate\Models\Lead;

/**
 * Class RegisterController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class RegisterController
{
    use RegistersUsers;

    protected const MEMBER_TYPE  = 'Robust\RealEstate\Models\Lead';
    /**
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:real_estate_leads'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        //we have to overwrite this in future
        $lead = Lead::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['email'],
            'deal_type' => Str::random(20),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return User::create([
            'member_id' => $lead->id,
            'member_type' => self::MEMBER_TYPE,
            'email' => $lead->email,
            'password' => $lead->password,
            'user_name' => $lead->username,
        ]);
    }
}

<?php

namespace Robust\RealEstate\Controllers\Website\Leads;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class AuthController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * @return mixed
     */
}

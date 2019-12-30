<?php

namespace Robust\Admin\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robust\Admin\Repositories\Website\RegisterRepository;
use Robust\Core\Controllers\Admin\Controller;
use Robust\Core\Helpage\Site;

/**
 * Class UserController
 * @package Robust\Admin\Controllers\Admin
 */
class LoginController extends Controller
{
    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(RegisterRepository $user, Request $request)
    {
        $this->model = $user;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view(Site::templateResolver('admin::website.auth.login'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPassword()
    {
        return view(Site::templateResolver('admin::website.auth.reset-password'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        $userdata = [
            'email' => $this->request->get('email'),
            'password' => $this->request->get('password')
        ];

        if (Auth::attempt($userdata)) {
            if (\Cache::get('redirect_url')) {
                $redirect_url = \Cache::get('redirect_url');
            }
            if (isset($redirect_url)) {
                return redirect($redirect_url);
            }
            return redirect()->route('website.home');
        } else {
            return redirect()->back()->with('error', 'Invalid Login Credentials.');
        }
    }
}

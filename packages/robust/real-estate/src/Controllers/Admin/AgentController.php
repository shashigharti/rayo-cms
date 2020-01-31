<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Robust\Admin\Repositories\Admin\UserRepository;
use Robust\Core\Repositories\Admin\DashboardRepository;
use Robust\RealEstate\Events\AgentCreatingEvent;
use Robust\RealEstate\Repositories\Admin\AgentRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

/**
 * Class AgentController
 * @package Robust\RealEstate\Controllers\Admin
 */
class AgentController extends Controller
{
    use CrudTrait, ViewTrait;
    /**
     * @var AgentRepository
     */
    protected $model;

    /**
     * AgentController constructor.
     * @param AgentRepository $model
     */
    public function __construct(AgentRepository $model,UserRepository $user,DashboardRepository $dashboard)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Agent';
        $this->package_name = 'real-estate';
        $this->view = 'admin.agents';
        $this->title = 'Agents';
        $this->user = $user;
        $this->dashboard = $dashboard;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = with(new $this->ui)->addrules;
        $this->validate($request,
            $rules
        );
        $data = $request->all();
        $new_user = $this->user->store([
            'user_name' => $data['email'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => md5(uniqid(rand(), true))
        ]);
        \Log::info($new_user);
        $this->dashboard->store([
            'name' => "{$data['first_name']} Dashboard",
            'slug' => str_slug("{$data['first_name']} Dashboard"),
            'description' => 'Main Dashboard',
            'is_default' => true,
            'user_id' => $new_user->id
        ]);
        if ($new_user) {
            // Raise user created event
            event(new AgentCreatingEvent($new_user, $data));
        }
        return redirect()->route('admin.agents.index');
    }
}

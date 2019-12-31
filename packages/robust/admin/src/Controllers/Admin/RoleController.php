<?php

namespace Robust\Admin\Controllers\Admin;

use Robust\Admin\Repositories\Admin\RoleRepository;
use Robust\Core\Controllers\Admin\Controller;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Core\Helpers\MenuHelper;


/**
 * Class RoleController
 * @package Robust\Admin\Controllers\Admin
 */
class RoleController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * RoleController constructor.
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->middleware('auth');
        $this->model = $role;
        $this->ui = 'Robust\Admin\UI\Role';
        $this->package_name = 'admin';
        $this->view = 'admin.roles';
        $this->title = 'Roles';
    }

}
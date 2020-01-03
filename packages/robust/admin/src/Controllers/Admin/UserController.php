<?php
namespace Robust\Admin\Controllers\Admin;

use Robust\Admin\Repositories\Admin\UserRepository;
use Robust\Core\Controllers\Admin\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\Core\Helpers\MenuHelper;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Services\MailService;

/**
 * Class UserController
 * @package Robust\Admin\Controllers\Admin
 */
class UserController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->middleware('auth');
        $this->model = $user;
        $this->ui = 'Robust\Admin\UI\User';
        $this->package_name = 'admin';
        $this->view = 'admin.users';
        $this->title = 'Users';
        $this->events = [
            'store' => 'Robust\Core\Events\UserCreatedEvent',
            'update' => 'Robust\Core\Events\UserUpdatedEvent'
        ];

    }

}

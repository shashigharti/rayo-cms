<?php
namespace Robust\Admin\Controllers\API;

use App\Http\Controllers\Controller;

use Robust\Admin\Repositories\Admin\AdminRepository;
use Robust\Admin\Repositories\Admin\UserRepository;
use Robust\Core\Controllers\Admin\Traits\UserTrait;


/**
 * Class AdminController
 * @package Robust\Admin\Controllers\API
 */
class AdminController extends Controller
{
    use UserTrait;
    /**
     * @var AdminRepository
     */
    protected $model;
    /**
     * @var UserRepository
     */
    protected $user;
    /**
     * @var array
     */
    /**
     * @var array
     */
    protected $storeRequest,$updateRequest;
    /**
     * @var string
     */
    protected $resource = 'Robust\Admin\Resources\AdminResource';
    /**
     * @var string
     */
    protected $namespace;

    /**
     * AdminController constructor.
     * @param AdminRepository $model
     * @param UserRepository $user
     */
    public function __construct(AdminRepository $model, UserRepository $user)
    {
        $this->model = $model;
        $this->user = $user;
        $this->storeRequest = [
            'first_name' => 'required| min:1',
            'last_name' => 'required| min:1',
            'user_name' => 'required| min:1',
            'email' => 'required| min:1 |unique:users',
            'roles' => 'required',
            'password'=>['required','confirmed'],
            'password_confirmation'=>'required'
        ];
        $this->updateRequest = [
            "first_name" => "required",
            "last_name" => "required",
            "user_name" => "required",
            "email" => "required|max:250"
        ];
        $this->namespace = 'Robust\Admin\Models\Admin';
    }

}

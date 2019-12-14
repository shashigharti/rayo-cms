<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;

use Robust\Admin\Repositories\Admin\UserRepository;
use Robust\Core\Controllers\Admin\Traits\UserTrait;
use Robust\RealEstate\Repositories\API\AgentRepository;


/**
 * Class AgentsController
 * @package Robust\RealEstate\Controllers
 */
class AgentsController extends Controller
{
    use UserTrait;

    /**
     * @var AgentRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $resource;
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var array
     */
    protected $storeRequest;
    /**
     * @var array
     */
    protected  $updateRequest;
    /**
     * @var string
     */
    protected $namespace;


    /**
     * AgentsController constructor.
     * @param AgentRepository $model
     * @param UserRepository $user
     */
    public function __construct(AgentRepository $model, UserRepository $user)
    {
        $this->model=$model;
        $this->user=$user;
        $this->resource = 'Robust\RealEstate\Resources\Agent';
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
        $this->namespace = 'Robust\RealEstate\Models\Agent';
    }
}

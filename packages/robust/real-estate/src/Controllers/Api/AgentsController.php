<?php
namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Robust\Admin\Resources\UserResource;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\AgentRepository;
use Robust\RealEstate\Resources\Agent;


/**
 * Class AgentsController
 * @package Robust\RealEstate\Controllers\Api
 */
class AgentsController extends Controller
{
    use ApiTrait;
    protected $model,$resource;
    protected $storeRequest,$updateRequest;


    public function __construct(AgentRepository $model)
    {
        $this->model=$model;
        $this->resource = 'Robust\RealEstate\Resources\Agent';
        $this->storeRequest = [
            'first_name' => 'required| min:1',
            'last_name' => 'required| min:1',
            'user_name' => 'required| min:1',
            'email' => 'required| min:1 |unique:users',
            'role' => 'required',
            'password'=>['required','confirmed'],
            'password_confirmation'=>'required'
        ];
        $this->updateRequest = [
            "first_name" => "required",
            "last_name" => "required",
            "user_name" => "required",
            "email" => "required|max:250"
        ];
    }

    public function index()
    {
        return $this->resource::collection($this->model->with('member')->get());
    }
    //must overwrite agents
}

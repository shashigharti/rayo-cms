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

    public function __construct(AgentRepository $model)
    {
        $this->model=$model;
        $this->resource = 'Robust\RealEstate\Resources\Agent';
    }
    //must overwrite agents
}

<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\AgentRepository;


class AgentController extends Controller
{
   
    protected $model;

    public function __construct(AgentRepository $model)
    {
        $this->model = $model;
    }
}

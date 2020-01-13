<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function __construct(AgentRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Agent';
        $this->package_name = 'real-estate';
        $this->view = 'admin.agents';
        $this->title = 'Agents';
    }
}

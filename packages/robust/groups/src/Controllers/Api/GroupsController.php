<?php

namespace Robust\Groups\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\Groups\Repositories\Admin\GroupRepository;


/**
 * Class GroupsApiController
 * @package Robust\Groups\Controllers\Admin
 */
class GroupsController extends Controller
{
    use ApiTrait;
    /**
     * @var GroupRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $resource;

    /**
     * GroupsController constructor.
     * @param GroupRepository $model
     */
    public function __construct(GroupRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Groups\Resources\CoreGroup';
    }
}

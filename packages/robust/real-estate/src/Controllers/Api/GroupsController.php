<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\GroupRepository;


/**
 * Class GroupsController
 * @package Robust\RealEstate\Controllers\Api
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
        $this->resource = 'Robust\RealEstate\Resources\CoreGroup';
    }
}

<?php

namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\API\Traits\CrudTrait;
use Robust\RealEstate\Repositories\API\GroupRepository;


/**
 * Class GroupsController
 * @package Robust\RealEstate\Controllers\API
 */
class GroupsController extends Controller
{
    use CrudTrait;

    /**
     * @var GroupRepository
     */
    protected $model;

    /**
     * @var string
     */
    protected $resource;

    /**
     * @var array
     */
    protected $storeRequest;
    /**
     * @var array
     */
    protected $updateRequest;

    /**
     * GroupsController constructor.
     * @param GroupRepository $model
     */
    public function __construct(GroupRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\RealEstate\Resources\CoreGroup';
        $this->storeRequest = [
          'name' => 'required|max:255',
          'color' => 'required|max:255',
          'status' => 'required',
        ];
        $this->updateRequest = [
            'name' => 'required|max:255',
            'color' => 'required|max:255',
            'status' => 'required',
        ];

    }
}

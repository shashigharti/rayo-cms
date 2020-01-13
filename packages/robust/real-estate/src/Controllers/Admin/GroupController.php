<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\GroupRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

/**
 * Class GroupController
 * @package Robust\RealEstate\Controllers\Admin
 */
class GroupController extends Controller
{
    use CrudTrait, ViewTrait;
    /**
     * @var GroupRepository
     */
    protected $model;

    /**
     * GroupController constructor.
     * @param GroupRepository $model
     */
    public function __construct(GroupRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Group';
        $this->package_name = 'real-estate';
        $this->view = 'admin.groups';
        $this->title = 'Groups';
    }
}

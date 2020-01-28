<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\RealEstate\Repositories\Admin\LeadStatusRepository;


/**
 * Class StatusController
 * @package Robust\RealEstate\Controllers\Admin
 */
class StatusController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * @var LeadStatusRepository
     */
    protected $model;


    /**
     * StatusController constructor.
     * @param LeadStatusRepository $model
     */
    public function __construct(LeadStatusRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Status';
        $this->package_name = 'real-estate';
        $this->view = 'admin.status';
        $this->title = 'Status';
    }
}

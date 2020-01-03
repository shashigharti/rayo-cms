<?php

namespace Robust\Core\Controllers\Admin;

use Illuminate\Http\Request;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\Core\Repositories\Admin\ScheduleRepository;

/**
 * Class ScheduleController
 * @package Robust\Core\Controllers\Admin
 */
class ScheduleController extends Controller
{
    use ViewTrait, CrudTrait;

    /**
     * ScheduleController constructor.
     * @param ScheduleRepository $model
     */
    public function __construct(
        ScheduleRepository $model
    ) {
        $this->model = $model;
        $this->ui = 'Robust\Core\UI\Schedule';
        $this->package_name = 'core';
        $this->view = 'admin.schedules';
        $this->title = 'Task Schedules';
        $this->redirect = 'admin.schedules';

    }


}

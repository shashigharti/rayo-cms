<?php


namespace Robust\RealEstate\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Robust\RealEstate\Repositories\Admin\MlsLogRepository;

/**
 * Class MlsLogController
 * @package Robust\Mls\Controllers\Admin
 */
class MlsLogController extends Controller
{
    use CrudTrait,ViewTrait;

    /**
     * MlsLogController constructor.
     * @param Request $request
     * @param MlsLogRepository $model
     */
    public function __construct(Request $request, MlsLogRepository $model)
    {
        $this->model = $model;
        $this->request = $request;
        $this->package_name = 'mls';
        $this->view = 'admin.logs';
        $this->title = 'Mls Query Log';
        $this->ui = 'Robust\RealEstate\UI\MlsLog';
        $this->redirect = 'admin.mlslog';
    }
}

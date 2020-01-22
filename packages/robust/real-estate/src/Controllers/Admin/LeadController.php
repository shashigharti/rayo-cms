<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Helpers\MenuHelper;
use Robust\RealEstate\Models\LeadFollowup;
use Robust\RealEstate\Repositories\Admin\LeadFollowUpRepository;
use Robust\RealEstate\Repositories\Admin\LeadRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

/**
 * Class LeadController
 * @package Robust\RealEstate\Controllers\Admin
 */
class LeadController extends Controller
{
    use CrudTrait, ViewTrait;
    /**
     * @var LeadRepository
     */
    protected $model;

    /**
     * LeadController constructor.
     * @param LeadRepository $model
     */
    public function __construct(LeadRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Lead';
        $this->package_name = 'real-estate';
        $this->view = 'admin.leads';
        $this->title = 'Leads';
        $this->table = 'real-estate::admin.leads.index';
    }

    /**
     * @param $id
     * @param $type
     * @return \Robust\Core\Controllers\Common\Traits\view
     */
    public function getDetailsPage($id, $type)
    {
        return $this->display("real-estate::admin.leads.create",
            [
                'model' => $this->model->find($id),
                'type'  => $type
            ]
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function addLeadsFollowUp(Request $request,LeadFollowUpRepository $model , $id)
    {
        $data = $request->all();
        $model->store($data);
        return response()->json(['data'=>$data]);
    }

    public function sendEmail(Request $request)
    {
        dd($request);
    }
}

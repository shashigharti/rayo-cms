<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Helpers\MenuHelper;
use Robust\RealEstate\Events\SendEmailToLead;
use Robust\RealEstate\Helpers\LeadGroupHelper;
use Robust\RealEstate\Helpers\LeadHelper;
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $qBuilder = $this->model;
        $qBuilder = $qBuilder->whereStatus(isset($params['status']) ? $params['status'] : null);
        $qBuilder = $qBuilder->whereAgent(isset($params['agent']) ? $params['agent'] : null);
        return view('real-estate::admin.leads.index',[
            'records'=>$qBuilder->paginate(10),
            'ui' => $this->ui,
        ]);
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
     * @param LeadFollowUpRepository $model
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLeadsFollowUp(Request $request, LeadFollowUpRepository $model , $id)
    {
        $data = $request->all();
        $model->store($data);
        return response()->json(['data'=>$data]);
    }

    /**
     * @param $id
     * @param Request $request
     * @param LeadGroupHelper $groupHelper
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGroup($id, Request $request, LeadGroupHelper $groupHelper)
    {
        $data = $request->all();
        $groupHelper->update($data['id'],$id);
        $groups = $this->model->where('id',$id)->first()->groups()->get();
        return response()->json($groups);
    }

    /**
     * @param $id
     * @param $group
     * @param LeadGroupHelper $groupHelper
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGroup($id, $group, LeadGroupHelper $groupHelper)
    {
        $groupHelper->delete($id,$group);
        return response()->json('Successfully deleted',200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request)
    {
        $data = $request->all();
        //filter message before sending
        foreach ($data['to'] as $to)
        {
            event(new SendEmailToLead($to,$data['subject'],$data['body']));
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param LeadHelper $helper
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModal(Request $request, LeadHelper $helper)
    {
        $data = $request->all();
        return view('real-estate::admin.leads.partials.modals.'.$data['view'],
            [
                'lead' => $this->model->find($data['lead']),
                'mode' => $data['mode'] .'-' . $data['view'],
                'value' => $data['value'],
                'action' => $data['action'],
                'type' => $data['type'],
                'relation' => $data['relation_id'],
                'id' => $data['view'] . '-' . $data['type'],
                'lead_helper' => $helper
            ]);
    }
}


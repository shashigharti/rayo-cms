<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Events\SendEmailToLead;
use Robust\RealEstate\Helpers\LeadHelper;
use Robust\RealEstate\Repositories\Admin\GroupLeadRepository;
use Robust\RealEstate\Repositories\Admin\LeadFollowUpRepository;
use Robust\RealEstate\Repositories\Admin\LeadGroupRepository;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function review($id)
    {
        $lead = $this->model->find($id);
        return view('core::website.user-profile.index',['lead'=>$lead]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addFollowup(Request $request, LeadFollowUpRepository $model , $id)
    {
        $data = $request->all();
        $data['lead_id'] = $id;
        $model->store($data);
        return  redirect()->back()->with(['message' => 'Successfully added Followup']);
    }

    /**
     * @param Request $request
     * @param LeadFollowUpRepository $model
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFollowup(Request $request, LeadFollowUpRepository $model , $id)
    {
        $data = $request->all();
        $model->update($id,$data);
        return  redirect()->back()->with(['message' => 'Successfully added Followup']);
    }


    /**
     * @param $id
     * @param Request $request
     * @param LeadGroupRepository $leadGroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGroup($id, Request $request, GroupLeadRepository $leadGroup)
    {
        $data = [
          'group_id' => $request->id,
          'lead_id' => $id
        ];
        $leadGroup->update($data);
        $groups = $this->model->where('id',$id)->first()->groups()->get();
        return response()->json($groups);
    }


    /**
     * @param $id
     * @param $group
     * @param LeadGroupRepository $leadGroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGroup($id, $group, GroupLeadRepository $leadGroup)
    {
        $leadGroup->delete($id,$group);
        return response()->json('Successfully deleted',200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request,$id)
    {
        $lead = $this->model->find($id);
        $data = $request->all();
        //filter message before sending
        foreach ($data['to'] as $to)
        {
            event(new SendEmailToLead($to,$data['subject'],$data['body'],$lead));
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

    public function storeSearch(Request $request)
    {
        dd($request);
    }
}


<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robust\RealEstate\Repositories\Website\LeadRequestRepository;


/**
 * Class RequestController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class RequestController extends Controller
{

    /**
     * @var LeadRequestRepository
     */
    protected $model;


    /**
     * RequestController constructor.
     * @param LeadRequestRepository $model
     */
    public function __construct(LeadRequestRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id)
    {
        $data['agent_id'] = 1;
        $data['listing_id'] = $id;
        $data['lead_id'] = Auth::user()->memberable->id;
        $data['type'] = 'schedule_viewing';
        $data['status'] = 'pending';
        $this->model->store($data);
        return redirect()->back();
    }
}

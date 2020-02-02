<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Events\LeadSearchEvent;
use Robust\RealEstate\Repositories\Website\LeadRepository;
use Robust\RealEstate\Repositories\Website\LeadSearchRepositories;


/**
 * Class LeadController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class LeadController extends Controller
{


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
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSearch()
    {
        $lead = isLead();
        if($lead){
            $params = request()->all();
            event(new LeadSearchEvent($lead,json_encode($params)));
        }
        return redirect()->back();
    }
}

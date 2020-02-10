<?php


namespace Robust\RealEstate\Controllers\Website\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Robust\Admin\Events\UserActivityEvent;
use Robust\RealEstate\Events\LeadDistanceEvent;
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
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $data = $request->except('_token');
        $this->model->update($id,$data);
        return redirect()->back()->with('message', 'Profile Updated');
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

    /**
     * @param $listing_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeDistance($listing_id, Request $request)
    {
        $lead = isLead();
        if($lead){
            event(new UserActivityEvent($lead->user,'Calculated Distance',url()->previous(),'from ' .$request->from));
            event(new LeadDistanceEvent($lead->id,$listing_id,$request->from));
            return response()->json(['success']);
        }
        return response()->json(['Not Logged In']);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword($id, Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $lead = isLead($this->model->find($id)->user);
        if($lead){
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            //check old pw
            if(Hash::check($data['old_password'],$lead->user->password)){
                $lead->user->update([
                    'password' => Hash::make($data['password'])
                ]);
                return redirect()->back()->with('message', 'Password Updated');
            };

            return redirect()->back()->withErrors(['old_password' => 'Old password did not match our system']);
        }
        return redirect()->back()->withErrors(['lead' => 'User is not a lead']);
    }
}

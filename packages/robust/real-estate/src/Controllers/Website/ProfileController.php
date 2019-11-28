<?php


namespace Robust\RealEstate\Controllers\Website;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robust\RealEstate\Repositories\Api\LeadRepositories;

/**
 * Class ProfileController
 * @package Robust\RealEstate\Controllers\Website
 */
class ProfileController
{
    /**
     * @var LeadRepositories
     */
    protected $lead;

    /**
     * ProfileController constructor.
     * @param LeadRepositories $lead
     */
    public function __construct(LeadRepositories $lead)
    {
        $this->lead = $lead;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user()->load('member');
            $lead = $user->member->load('favourites','bookmarks','reports','searches');
            return view('real-estate::website.profile.index',['lead' => $lead]);
        }
        return  redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $lead = Auth::user()->load('member')->member;
        if($lead){
            $this->lead->update($lead->id,$data);
        }
        return redirect()->back();
    }
}

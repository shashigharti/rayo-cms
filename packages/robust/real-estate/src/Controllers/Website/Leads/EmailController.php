<?php


namespace Robust\RealEstate\Controllers\Website\Leads;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robust\Admin\Models\User;
use Robust\RealEstate\Events\SendEmailToAgent;
use Robust\RealEstate\Events\SendEmailToFriend;
use Robust\RealEstate\Repositories\Website\ListingRepository;

/**
 * Class EmailController
 * @package Robust\RealEstate\Controllers\Website\Leads
 */
class EmailController
{
    /**
     * @var ListingRepository
     */
    protected $listing;

    /**
     * EmailController constructor.
     * @param ListingRepository $listing
     */
    public function __construct(ListingRepository $listing)
    {
        $this->listing = $listing;
    }


    /**
     * @param $slug
     * @param Request $request
     */
    public function sendEmailToFriend($slug, Request $request)
    {
        $data = $request->all();
        $listing = $this->listing->getSingle($slug);
        $member = Auth::user()->memberable;
        event(new SendEmailToFriend($data['email_to'],$listing,$member,$data['message']));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function sendEmailtoAgent($id, Request $request)
    {
        //agents assigned mail
        $data = $request->all();
        $lead = Auth::user()->memberable;
        $agent = $lead->agent ?? User::where('id',1)->first();
        event(new SendEmailToAgent($agent->email,$this->listing->find($id),Auth::user()->memberable,$data['message']));
    }
}

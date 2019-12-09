<?php


namespace Robust\RealEstate\Controllers\Website\Leads;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @param $id
     * @param Request $request
     */
    public function sendEmailToFriend($id, Request $request)
    {
        $data = $request->all();
        event(new SendEmailToFriend($data['email_to'],$this->listing->find($id),Auth::user()->member,$data['message']));
    }

    public function sendEmailtoAgent($id,Request $request)
    {
        //agents assigned mail
        $data = $request->all();
        event(new SendEmailToAgent('dummy@gmail.com',$this->listing->find($id),Auth::user()->member,$data['message']));
    }
}

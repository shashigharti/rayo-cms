<?php

namespace Robust\Core\Helpers;

use Carbon\Carbon;
use Robust\RealEstate\Models\Lead;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\SentEmails;

/**
 * Class DashboardHelper
 * @package Robust\Core\Helpers
 */
class DashboardHelper
{
    /**
     * @var Lead
     */
    protected $lead;
    /**
     * @var Listing
     */
    protected $listing;
    /**
     * @var SentEmails
     */
    protected $emails;

    /**
     * DashboardHelper constructor.
     * @param Lead $lead
     * @param Listing $listing
     * @param SentEmails $emails
     */
    public function __construct(Lead $lead, Listing $listing, SentEmails $emails)
    {
        $this->lead = $lead;
        $this->listing = $listing;
        $this->emails = $emails;
    }

    /**
     * @return mixed
     */
    public function totalLeads(){
        return $this->lead->count();
    }

    public function totalListing()
    {
        return $this->listing->count();
    }

    public function newListing()
    {
        return $this->listing->where('input_date','>',Carbon::now()->subWeek())->count();
    }
    /**
     * @param $status
     * @return mixed
     */
    public function totalListingsByStatus($status){
        return $this->listing->where('status',$status)->count();
    }

    /**
     * @return mixed
     */
    public function totalNewListings(){
        return $this->listing->whereDate('created_at',Carbon::today())->count();
    }

    /**
     * @return mixed
     */
    public function totalEmailsSent(){
        return $this->emails->count();
    }
}

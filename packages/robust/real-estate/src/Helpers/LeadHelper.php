<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\Lead;
use Robust\RealEstate\Models\LeadFavourites;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Repositories\Admin\LeadRepository;

/**
 * Class LeadHelper
 * @package Robust\RealEstate\Helpers
 */
class LeadHelper
{

    /**
     * @var mixed
     */
    private $leads;

    /**
     * LeadHelper constructor.
     * @param LeadRepository $lead
     */
    public function __construct(LeadRepository $lead)
    {
        $this->leads = $lead->get();
    }

    /**
     * @param $lead_id
     * @return mixed
     */
    public function getLeadsFav($lead_id)
    {
        return LeadFavourites::where('lead_id',$lead_id)->get();
    }

}

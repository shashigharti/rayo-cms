<?php
namespace Robust\RealEstate\Helpers;

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

}

<?php
namespace Robust\RealEstate\Helpers;


/**
 * Class LeadPropertiesHelper
 * @package Robust\RealEstate\Helpers
 */
class LeadPropertiesHelper
{

    /**
     * @param $lead
     * @return mixed
     */
    public function getAllEmails($lead)
    {
        $emails = $lead->properties()->where('type','email')->get()->pluck('value','value')->toArray();
        $email = $lead->user()->first()->email;
        $emails[$email] = $email;
        return $emails;
    }

}

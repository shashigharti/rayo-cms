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

    /**
     * @param $lead
     * @return mixed
     */
    public function getProperties($lead)
    {
        return $lead->properties()->get()->pluck('value','type')->toArray();
    }

    /**
     * @param $lead
     * @param $types
     * @return mixed
     */
    public function byType($lead, $types)
    {
        return $lead->properties()->whereIn('type',$types)->get();
    }
}

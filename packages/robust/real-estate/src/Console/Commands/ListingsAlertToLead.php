<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;

class ListingsAlertToLead extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:listings-alerts-to-lead';

    /**
     * @var string
     */
    protected $description = 'Send listings alerts to lead';



    public function handle()
    {
        // Get all leads who don't have saved searches AND viewed some listing
        $leads = Lead::with('viewedListings')
            ->where('user_type', '<>', Lead::DISCARDED)
            ->whereHas('viewedListings')
            ->doesntHave('searches')->get();
            
        //$automationAlert = get_settings('automation_alerts');
        if (! $leads || ! ($automationAlert && $automationAlert != null) ) {
            return false;
        }

         // Loop on leads
        foreach ($leads as $lead) {
            // Get viewed listings
            $viewedListings = $lead->viewedListings;

            // Listing prices array
            $listing_prices = [];
            $zip_codes      = [];
            $cities         = [];
            foreach ($viewedListings as $viewedListing) {
                $cities[]         = $viewedListing['city'];
                $listing_prices[] = $viewedListing['system_price'];
                $zip_codes[]      = $viewedListing['zip'];
            }

            $priceRanges  = [];//$this->getAppropriatePricesRange($listing_prices);
            $zip_code = [];//$this->getCities($zip_codes);
            $minRange = $priceRanges['range_min'];
            $maxRange = $priceRanges['range_max'];
            $listings = [];//$this->getListingsToBeSent($zip_code, $minRange, $maxRange, $lead->id);

            if ($listings) {
                $this->sendEmail($lead->id, $listings);
            }
        }

        
    }

}

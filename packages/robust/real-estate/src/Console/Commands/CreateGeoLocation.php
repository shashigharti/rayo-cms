<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Helpers\GeoLocationHelper;
use Robust\RealEstate\Repositories\Admin\ListingRepository;


/**
 * Class CreateGeoLocation
 * @package Robust\Mls\Console\Commands
 */
class CreateGeoLocation extends Command
{


    /**
     * @var string
     */
    protected $signature = 'mls:create-geo-locations';


    /**
     * @var string
     */
    protected $description = 'Creates Geo Locations for empty latitude & longitude';

    /**
     * @var GeoLocationHelper
     */
    protected $helper,$model;


    /**
     * CreateGeoLocation constructor.
     * @param GeoLocationHelper $helper
     * @param ListingRepository $model
     */
    public function __construct(GeoLocationHelper $helper, ListingRepository $model)
    {
        parent::__construct();
        $this->helper = $helper;
        $this->model = $model;
    }


    /**
     *
     */
    public function handle()
    {
        $listings = $this->model->getListingsWithoutCoordinates();
        $failed_count = $success_count = 0;
        $total_count = $listings->count();
        $listings->chunk(100,function($chunkedListing) use ($success_count,$failed_count,$total_count){
           foreach ($chunkedListing as $listing){
              $geolocation = $this->helper->getCoordinates($listing->listing_name,3);
              if($geolocation){
                  $data = [
                      'latitude' => $geolocation['geometry']['location']['lat'],
                      'longitude' => $geolocation['geometry']['location']['lng'],
                  ];
                  if(!$listing->zip && isset($geolocation['address_components'])) {
                      foreach ($geolocation['address_components'] as $component){
                          if(in_array('postal_code',$component['types'])){
                              $data['zip'] = $component['short_name'];
                          }
                      }
                  }
                  $listing->update($data);
                  $success_count++;
              } else {
                  $data = [
                      'latitude' => null,
                      'longitude' => null,
                  ];
                  $listing->update($data);
                  $failed_count++;
              }
              $this->info("Succeed : $success_count || Failed : $failed_count || Total : $total_count");
           }
        });
    }

}

<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Zip;


/**
 * Class GenerateNames
 * @package Robust\RealEstate\Console\Commands
 */
class GenerateNames extends Command
{

    /**
     * @var string
     */
    protected $signature = 'rws:generate-names';

    /**
     * @var string
     */
    protected $description = 'Generates Listing Names';


    /**
     * GenerateNames constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     *
     */
    public function handle()
    {
        Listing::select('id','city_id','zip_id','address_number')
                ->chunk(1000,function ($listings){
                    foreach ($listings as $listing){
                        $name  = '';
                        $name .= ucfirst($listing->address_number);
                        $city = City::where('id',$listing->city_id)->first();
                        if($city){
                            $name .= ', ' . $city->name;
                        }
                        $zip =  Zip::where('id',$listing->zip_id)->first();
                        if($zip){
                            $name .= ' ' . $zip->name;
                        }
                       $listing->update(
                            ['name' => $name,'slug' => Str::slug($name)]
                        );
                        $this->info($listing->name);
                    }
                });
    }

}

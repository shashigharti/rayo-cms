<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Robust\RealEstate\Repositories\Website\AmenityRepository;
use Robust\RealEstate\Repositories\Website\ConstructionRepository;
use Robust\RealEstate\Repositories\Website\ExteriorRepository;
use Robust\RealEstate\Repositories\Website\InteriorRepository;
use Robust\RealEstate\Repositories\Website\StyleRepository;


/**
 * Class ListingFeature
 * @package Robust\RealEstate\Console\Commands
 */
class ListingFeature extends Command
{
    /**
     * @var AmenityRepository
     */
    protected $amenities;
    /**
     * @var StyleRepository
     */
    protected $styles;
    /**
     * @var ConstructionRepository
     */
    protected $constructions;
    /**
     * @var InteriorRepository
     */
    protected $interiors;
    /**
     * @var ExteriorRepository
     */
    protected $exteriors;

    /**
     * @var string
     */
    protected $signature = 'real-estate:listing-feature';
    /**
     * @var string
     */
    protected $description = 'Seeds listing feature table for advance search';


    /**
     * ListingFeature constructor.
     * @param AmenityRepository $amenities
     * @param StyleRepository $styles
     * @param ConstructionRepository $constructions
     * @param InteriorRepository $interiors
     * @param ExteriorRepository $exteriors
     */
    public function __construct
    (
        AmenityRepository $amenities,
        StyleRepository $styles,
        ConstructionRepository $constructions,
        InteriorRepository $interiors,
        ExteriorRepository $exteriors
    )
    {
        parent::__construct();
        $this->amenities = $amenities;
        $this->styles = $styles;
        $this->constructions = $constructions;
        $this->interiors = $interiors;
        $this->exteriors = $exteriors;
    }


    /**
     *
     */
    public function handle()
    {
        $mappings = [
          'amenities' => 'amenities',
          'constructions' => 'construction',
          'interiors' => 'interior',
          'exteriors' => 'exterior'
        ];

        foreach ($mappings as $key => $column)
        {
            //need to change the table to properties
            $listings = \DB::table('real_estate_listing_details')->select($column)->groupBy($column)->get();
            foreach ($listings as $listing)
            {
                $features = explode(',',$listing->$column);
                foreach ($features as $feature)
                {
                    $this->$key->updateOrCreate(['slug' => Str::slug($feature)],[
                        'name' => $feature,
                        'slug' => Str::slug($feature)
                    ]);
                    $this->info('Key : ' . $key . ' || Feature : '.$feature);
                }
            }
        }
        $mappings = [
            'styles' => 'style'
        ];
        foreach ($mappings as $key => $column)
        {
            $listings = \DB::table('real_estate_listings')->select($column)->groupBy($column)->get();
            foreach ($listings as $listing)
            {
                $features = explode(',',$listing->$column);
                foreach ($features as $feature)
                {
                    $this->$key->updateOrCreate(['slug' => Str::slug($feature)],[
                        'name' => $feature,
                        'slug' => Str::slug($feature)
                    ]);
                    $this->info('Key : ' . $key . ' || Feature : '.$feature);
                }
            }
        }
    }

}

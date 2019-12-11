<?php


namespace Robust\RealEstate\Console\Commands;
use Illuminate\Support\Str;


/**
 * Class FieldsPull
 * @package Robust\RealEstate\Console\Commands
 */
class FieldsPull extends RetsCommands
{
    /**
     * @var string
     */
    protected $signature = 'rws:fields-pull';

    /**
     * @var string
     */
    protected $description = 'Pull Fields from server';


    /**
     * FieldsPull constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @var array
     */
    protected $mapping = [
      'City' => 'Robust\RealEstate\Models\City',
      'County' => 'Robust\RealEstate\Models\County',
      'Area' => 'Robust\RealEstate\Models\Area',
      'Elementary School' => 'Robust\RealEstate\Models\ElementarySchool',
      'Middle School' => 'Robust\RealEstate\Models\MiddleSchool',
      'High School' => 'Robust\RealEstate\Models\HighSchool',
      'Subdiv. Amenities' => 'Robust\RealEstate\Models\Amenity',
      'Construction' =>  'Robust\RealEstate\Models\Construction',
      'Property Condition' =>  'Robust\RealEstate\Models\Condition',
      'Interior Features' =>  'Robust\RealEstate\Models\Interior',
      'Exterior Features' =>  'Robust\RealEstate\Models\Exterior',
      'Zip Code' =>  'Robust\RealEstate\Models\Zip',
    ];

    /**
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MetadataNotFound
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle()
    {
        $fields = $this->rets->GetTableMetadata('Property', 'A');
        foreach ($fields as $field)
        {
            $name = $field->getLongName();
            if(isset($this->mapping[$name])) {
                $data = [];
                $values = $field->getLookupValues();
                foreach ($values as $value){
                   $data['name'] = $value->getLongValue();
                   $data['slug'] = Str::slug($data['name']);
                   $this->mapping[$name]::updateOrCreate(['slug'=>$data['slug']],$data);
                   $this->info('Type : ' . $name . ' || Value : ' . $data['name'] );
                }
            }
        }
    }
}

<?php
namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class CreateAttributes
 * @package App\Console\Commands
 */
class CreateAttributes extends Command
{
    /**
     * Create attributes
     * Example: rws:create-attributes
     * @var string
     */
    protected $signature = 'rws:create-attributes';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Create Attributes";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        // Get all listings
        $location_properties = \DB::table('real_estate_listing_properties')
        ->distinct('type')
        ->get();

        $all_properties = [];

        foreach($location_properties as $property){
            if(!isset($all_properties[$property->type])){
                $all_properties[$property->type] = [];
            }

            $new_values = explode(',', $property->value);            
            $values = array_diff($new_values, $all_properties[$property->type]);
            foreach($values as $value){
                // Numeric fields that can take any value are excluded
                if(is_numeric($value)){
                    continue;
                }      
                $all_properties[$property->type][] = $value;          
            }            
        }   
        
        foreach($all_properties as $key => $values){
            \DB::table('real_estate_attributes')->insert([
                'property_name' => $key,
                'name' => ucwords(str_replace('_', ' ', $key)),
                'values' => json_encode(collect($values)->map(function ($value) {
                        return ['name' => $value, 'status' => 1];
                    })),
                'status' => 1
            ]);
        } 
    }
}

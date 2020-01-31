<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        DB::table('real_estate_attributes')->truncate();
        $properties_types = \DB::table('real_estate_listing_properties')
            ->whereNotIn('type', ['public_remarks', 'virtual_tour', 'directions', 'modification_date', 'modified'])
            ->select('type')
            ->groupBy('type')
            ->get();
        $all_properties = [];
        foreach ($properties_types as $properties_type) {
            $type = $properties_type->type;
            $this->info($type);
            if (!isset($all_properties[$type])) {
                $all_properties[$type] = [];
            }
            $properties = \DB::table('real_estate_listing_properties')
                ->where('type', $type)
                ->limit(1000)
                ->get();
            foreach ($properties as $property) {
                $new_values = explode(',', $property->value);
                $values = array_diff($new_values, $all_properties[$property->type]);
                foreach ($values as $value) {
                    if (is_numeric($value)) {
                        continue;
                    }
                    $all_properties[$type][] = $value;
                }
            }
        }
        foreach ($all_properties as $key => $values) {
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

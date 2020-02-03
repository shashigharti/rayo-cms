<?php

namespace Robust\RealEstate\Console\Commands;
use Illuminate\Console\Command;

use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Models\Page;
/**
 * Class CreatePages
 * @package Robust\RealEstate\Console\Commands
 */
class CreatePages extends Command
{

    /**
     * Create pages for different locations
     * Example: rws:create-pages
     *
     * @var string
     */
    protected $signature = 'rws:create-pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate create pages for locations';

    protected $sublocations_map = [
        'subdivisions' => [
            'cities' => 'city_id',
            'zips' => 'zip_id'
        ],
        'zips' => [
            'cities' => 'city_id'
        ]
    ];

    protected $text_map = [
            'zip_id' => 'zip',
            'city_id' => 'city_name'
        ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $locations_types = config('real-estate.pages.location_types');
        foreach ($locations_types as $location_type => $meta_datas) {
            $locations = Location::where('locationable_type', get_class_by_location_type($location_type))->get();
            foreach ($locations as $location) {
                $replacements = [
                    '{{location_type}}' => $location_type,
                    '{{location_slug}}' => $location->slug,
                    '{{name}}' => $location->name
                ];
                $tmp_metadatas = $meta_datas;
                if(isset($this->sublocations_map[$location_type])){
                    foreach($this->sublocations_map[$location_type] as $field_type => $field_id){
                        $sublocations = $location->listings()->whereNotNull($field_id)->pluck($field_id);
                        $all_sublocations = Location::where('locationable_type', get_class_by_location_type($field_type))
                        ->whereIn('id', $sublocations)
                        ->get();
                        foreach($all_sublocations as $sublocation){
                            $text_to_replace = "{{" . $this->text_map[$field_id] ."}}";
                            $replacements = array_merge ($replacements, [
                                            $text_to_replace => $location->name
                                        ]);
                            foreach ($tmp_metadatas as $key => $metas) {
                                foreach($metas as $field => $meta){
                                    $locations_types[$location_type][$key][$field] = $this->replace_variables($replacements, $meta);
                                }
                                $locations_types[$location_type][$key]['route_type'] = $location_type;
                                Page::create($locations_types[$location_type][$key]);
                            }
                        }

                    }
                }else{
                    foreach ($tmp_metadatas as $key => $metas) {
                        foreach($metas as $field => $meta){
                            $locations_types[$location_type][$key][$field] = $this->replace_variables($replacements, $meta);
                        }
                        $locations_types[$location_type][$key]['route_type'] = $location_type;
                        Page::create($locations_types[$location_type][$key]);
                    }
                }
            }
        }
    }

    /**
     * @param $content
     * @return string|string[]
     */
    public function replace_variables($additional_replacements, $content)
    {
        $settings = settings('real-estate');
        $replacements = [
            '{{homes_for_sale}}' => $settings['url_active'],
            '{{client_name}}' => $settings['client']['name'],
            '{{homes_sold}}' => $settings['url_sold'],
            '{{state_cap}}' => $settings['client']['state']
        ];

        $replacements = array_merge($replacements, $additional_replacements);

        foreach ($replacements as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }

        return $content;
    }
}

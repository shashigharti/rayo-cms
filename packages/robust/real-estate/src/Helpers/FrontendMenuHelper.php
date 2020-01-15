<?php

namespace Robust\RealEstate\Helpers;

class FrontendMenuHelper
{
    public function filterMenu($location_type, $items)
    {
        $menu_settings = settings('real-estate');
        $character_count = $menu_settings['zip_code_character_count'];
        $zip_max_value = $menu_settings['zip_code_max'];

        $items_new = $items;

        if($location_type === 'zips' && $character_count != ''){
            $items_new = [];
            foreach($items as $item){
                if(strlen($item->name) <= $character_count){
                    $items_new[] = $item;
                }
            }
        }

        if($location_type === 'zips' && $zip_max_value != ''){
            $items_new = [];
            foreach($items as $item){
                if((int)$item->name <= $zip_max_value){
                    $items_new[] = $item;
                }
            }
        }

        return $items_new;
    }
}

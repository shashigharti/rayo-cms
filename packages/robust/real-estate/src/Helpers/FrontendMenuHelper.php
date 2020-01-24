<?php

namespace Robust\RealEstate\Helpers;

/**
 * Class FrontendMenuHelper
 * @package Robust\RealEstate\Helpers
 */
class FrontendMenuHelper
{
    /**
     * @param $location_type
     * @param $items
     * @return array|void
     */
    public function filterMenu($location_type, $items)
    {
        $menu_settings = settings('real-estate');
        $character_count = $menu_settings['zip_code_character_count'] ?? '';
        $zip_max_value = $menu_settings['zip_code_max'] ?? '';

        $items_new = $items;

        if ($location_type === 'zips' && $character_count != '') {
            $items_new = [];
            foreach ($items as $item) {
                if (strlen($item->name) <= $character_count) {
                    $items_new[] = $item;
                }
            }
        }

        if ($location_type === 'zips' && $zip_max_value != '') {
            $items_new = [];
            foreach ($items as $item) {
                if ((int)$item->name <= $zip_max_value) {
                    $items_new[] = $item;
                }
            }
        }

        $items_new = $this->sort($location_type, $items_new);
        $items_new = $this->hide_items($location_type, $items_new);

        return $items_new;
    }


    /**
     * @param $location_type
     * @param $items
     * @return mixed
     */
    public function hide_items($location_type, $items)
    {
        $settings = settings('front-page');
        if (isset($settings["hide_{$location_type}"]) && $settings["hide_{$location_type}"] != '') {
            $cities_to_hide = explode(',', $settings["hide_{$location_type}"]);
            foreach ($items as $key => $item) {
                if (in_array($item->slug, $cities_to_hide)) {
                    $items->forget($key);
                }
            }
        }
        return $items;
    }


    /**
     * @param $tabs
     * @param $tabs_order
     * @return mixed
     */
    public function sort_tabs($tabs, $tabs_order)
    {
        $tabs_new = [];
        if ($tabs_order == '') {
            ksort($tabs);
            return $tabs;
        }
        $tab_order_arr = explode(",", $tabs_order);
        foreach ($tab_order_arr as $key) {
            $tabs_new[$key] = $tabs[$key];
        }

        return $tabs_new;
    }


    /**
     * @param $location_type
     * @param $items
     * @return \Illuminate\Support\Collection
     */
    public function sort($location_type, $items)
    {
        $settings = settings('front-page');
        $items_with_different_order = [];
        $items_with_default_order = collect();
        $items = collect($items);

        $items = $items->sortBy('slug');

        if (isset($settings["{$location_type}_sort_order_desc"]) && $settings["{$location_type}_sort_order_desc"]) {
            $items = $items->sortByDesc('slug');
        }

        if (isset($settings["{$location_type}_order"])) {
            $items_to_skip = explode(',', $settings["{$location_type}_order"]);
            if ($items_to_skip !== '') {
                foreach ($items as $key => $item) {
                    if (in_array($item->slug, $items_to_skip)) {
                        $index = array_search($item->slug, $items_to_skip);
                        $items_with_different_order[$index] = $item;
                    } else {
                        $items_with_default_order->push($item);
                    }
                }
            }
            ksort($items_with_different_order);
            $items_with_different_order = collect($items_with_different_order);
            return $items_with_different_order->merge($items_with_default_order);
        }

        return $items;
    }
}

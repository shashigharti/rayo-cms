<?php

if (!function_exists('price_format')) {

    /**
     * Converts a number into a short version, eg: 1000 -> 1k
     * Reference: https://gist.github.com/RadGH/84edff0cc81e6326029c
     * @param int $n
     * @param int $precision
     * @return string
     */
    function price_format($n, $precision = 1)
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }

        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    }
}

if (!function_exists('price_range_format')) {

    /**
     * @param $price_range
     * @return string
     */
    function price_range_format($price_range)
    {
        $prices = explode('-', $price_range);
        if (count($prices) < 1) {
            $prices = explode('>', $prices[0]);
        }
        $price_start = strlen($prices[0]);
        $price_end = strlen($prices[1]);
        if ($prices[1] != '' && is_numeric($prices[1])) {
            if(($price_start > 5 && $price_start < 7)){
                $prices[0] = number_format($prices[0]);
            }elseif($price_start >= 7){
                $prices[0] = price_format($prices[0]);
            }

            if(($price_end > 5 && $price_end < 7)){
                $prices[1] = number_format($prices[1]);
            }elseif($price_end >= 7){
                $prices[1] = price_format($prices[1]);
            }

            return "$" . "{$prices[0]}-" . "$" . "{$prices[1]}";
        } elseif ($prices[1] == '') {
            if (isset($prices[0]) && is_numeric($prices[0])) {
                return "Above " . price_format($prices[0]);
            }
        }
        return $price_range;
    }
}

if (!function_exists('geocode')) {

    /**
     * @param string $address
     * @param integer $limit
     * @return array
     */
    function geocode($address, $limit = 3)
    {
        if ($limit == 0) {
            return false;
        }
        $addressLatLong = [];
        $api_key = settings('app-setting', 'google_api_key');
        try {
            $response = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=' . urlencode($api_key));
            $response = json_decode($response, true);

            if ($response['status'] == "OVER_QUERY_LIMIT") {
                sleep(1);
                \Log::info('GeoLocations: Limit exceeded');
                return geocode($address, $limit - 1);
            } elseif ($response['status'] == "ZERO_RESULTS") {
                return false;
            }

            if (isset($response['results'][0])) {
                $addressLatLong = $response['results'][0];
            }
            return $addressLatLong;
        } catch (\Exception $e) {
            return false;
        }
        return false;
    }

}
if (!function_exists('email_template')) {
    /**
     * @param string $name
     * @return string
     */
    function email_template($name)
    {
        return \Robust\RealEstate\Models\EmailTemplate::where('name', $name)->first();
    }
}

if (!function_exists('replace_variables')) {
    /**
     * @param string $content
     * @param eloquent $member
     * @param array $data
     * @return string
     */
    function replace_variables($content, $member, $data)
    {
        $type = 'agent';
        if (get_class($member) == 'Robust\RealEstate\Models\Lead') {
            $type = 'lead';
        }

        $replacements = [
            'lead' => [
                '*|LEAD_FIRSTNAME|*' => $member->first_name,
                '*|LEAD_LASTNAME|*' => $member->last_name,
                '*|LEAD_FULLNAME|*' => $member->first_name . " " . $member->last_name,
                '*|LEAD_MAIL|*' => $member->user->email,
                '*|LEAD_PHONE|*' => $member->phone_number,
                '*|SITE_NAME|*' => config('rws.client.email.name'),
                '*|VERIFICATION_LINK|*' => $data['verification_url'] ?? '',
                '*|UNSUBSCRIBE_LINK|*' => ''//'<a href="' . route('lead.unsubscribe', ['lead' => $this->lead->id]) . '">Unsubscribe</a>'
            ],
            'agent' => [
                '*|AGENT_FIRSTNAME|*' => $member->first_name,
                '*|AGENT_LASTNAME|*' => $member->last_name,
                '*|AGENT_FULLNAME|*' => $member->first_name . " " . $member->last_name,
                '*|AGENT_MAIL|*' => $member->user->email,
                '*|AGENT_PHONE|*' => $member->phone,

                '*|LISTING_STREET|*' => '',
                '*|LISTING_NUMBER|*' => '',
                '*|LISTING_SYSTEM_PRICE|*' => '',
                '*|LISTING_NAME|*' => '',
                '*|URL|*' => '',
                '*|SUBJECT_THIS_EMAIL|*' => $data['subject'],
                '*|LOGO|*' => $data['logo'],

                '*|FIRST_VIEW|*' => '',
                '*|VIEW_COUNT|*' => '',
                '*|LISTING_VIEWER|*' => '',
                '*|CONTENT|*' => '',
                '*|SELLING_AGENT|*' => '',
                '*|LOCATION_TYPE|*' => '',
                '*|COUNT_LOCATION|*' => ''
            ]
        ];

        $all_replacements = $replacements[$type];//array_merge($replacements[$type], $common);
        foreach ($all_replacements as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }

        $content = replace_global_variables($content);
        return $content;
    }
}

if (!function_exists('replace_global_variables')) {

    /**
     * @param string $content
     * @return string
     */
    function replace_global_variables($content)
    {
        $replacements = [
            '*|WEBSITE|*' => '<a href="' . \URL::to('/') . '">' . preg_replace('#^https?://#', '', \URL::to('/')) . '</a>',
            '*|SUBJECT_WEBSITE|*' => preg_replace('#^https?://#', '', \URL::to('/')),
            '*|FOOTER_TEXT|*' => '',
            '*|LOGO|*' => '<img style="max-width: 180px" src="" alt="">',
            '*|LOCATION|*' => settings('real-estate', 'client_name'),
            '*|CLIENT_NAME|*' => settings('real-estate', 'client_name'),
            '*|STATE|*' => settings('real-estate', 'state'),
            '*|COMPANY_NAME|*' => settings('general-setting', 'company_name'),
            '*|CONTACT_EMAIL|*' => settings('general-setting', 'contact_email'),
            '*|PHONE_NUMBER|*' => settings('general-setting', 'phone_number'),
        ];

        foreach ($replacements as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }

        return $content;
    }

}

if (!function_exists('replace_seo_variables')) {

    /**
     * @param string $content
     * @param array $segments
     * @return string
     */
    function replace_seo_variables($content, $segments)
    {
        $replacements = [
            '*|PRICE_RANGE|*' => $segments[5] ?? '',
            '*|NAME|*' => isset($segments[3]) ? ucwords(str_replace('-', ' ', isset($segments[3]))) : ucwords(str_replace('-', ' ', isset($segments[1]))),
            '*|CLIENT_NAME|*' => settings('real-estate', 'client') ? settings('real-estate', 'client')['name'] : '',
            '*|STATE|*' => settings('real-estate', 'client') ? settings('real-estate', 'client')['state'] : '',
            '*|COMPANY_NAME|*' => settings('general-setting', 'company_name'),
        ];

        foreach ($replacements as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }

        $content = replace_global_variables($content);

        return $content;
    }

}

if (!function_exists('generate_price_ranges')) {

    /**
     * @param null $min_price
     * @param null $max_price
     * @param null $increment
     * @return array
     */
    function generate_price_ranges($min_price = null, $max_price = null, $increment = null)
    {
        $ranges = [];
        $config = config('rws.application.price');
        $increment = $increment ?? $config['increment'];
        $i = $min_price ?? $config['min'];
        $max = $max_price ?? $config['max'];

        $priceArr = [];
        for (; $i <= $max; $i = $i + $increment) {
            $priceArr[] = $i;
        }

        if (array_search($max, $priceArr) < 0) {
            $priceArr[] = $max;
        }
        $max_array_count = count($priceArr);
        for ($j = 0; $j <= $max_array_count; $j += 2) {
            if ($j + 1 <= $max_array_count && isset($priceArr[$j + 1])) {
                $ranges[] = $priceArr[$j] . "-" . $priceArr[$j + 1];
            }
            //for odd increments like 9500 etc
            if (!isset($priceArr[$j]) || !isset($priceArr[$j + 1]))
                $ranges[] = $priceArr[$max_array_count - 1] . ">";
        }

        return $ranges;
    }
}


if (!function_exists('seo')) {

    /**
     * @param $segments
     * @return array|null
     */
    function seo($segments)
    {
        $page = null;
        $additional_route_params = [
            'price' => 'price',
        ];
        $segments_temp = $segments;

        for ($i = count($segments_temp) - 1; $i >= 0; $i--) {
            $partial_url_str = implode("/", $segments_temp);
            $page = (new \Robust\RealEstate\Models\Page)->where('url', $partial_url_str)->first();
            if ($page) {
                break;
            }
            unset($segments_temp[$i]);
        }

        if (!$page) {
            foreach ($additional_route_params as $param) {
                if (in_array($param, $segments)) {
                    $partial_url_str = $param;
                    $page = (new \Robust\RealEstate\Models\Page)->where('url', $partial_url_str)->first();
                    break;
                }
            }
        }
        if (!$page && count($segments_temp) == 0) {
            //home page
            $page = (new \Robust\RealEstate\Models\Page)->where('url', '/')->first();
        }
        if ($page) {
            $page->meta_description = replace_seo_variables($page->meta_description, $segments);
            $page->meta_title = replace_seo_variables($page->meta_title, $segments);
            $page->meta_keywords = replace_seo_variables($page->meta_keywords, $segments);
        }
        return $page;
    }
}

if (!function_exists('get_location_type_by_class')) {

    /**
     * @param $location_type
     * @return mixed|null
     */
    function get_location_type_by_class($location_type)
    {
        $location_maps = config('real-estate.frw.location_maps');
        return $location_maps[$location_type] ?? null;
    }
}

if (!function_exists('get_class_by_location_type')) {

    /**
     * @param $location_type_param
     * @return mixed|string|null
     */
    function get_class_by_location_type($location_type_param)
    {
        $location_maps = config('real-estate.frw.location_maps');
        foreach ($location_maps as $key => $location_type) {
            if ($location_type_param == $location_type) {
                return $key;
            }
        }
        return null;
    }
}

if (!function_exists('get_ids_by_location_type')) {

    /**
     * @param $location_type
     * @return mixed|null
     */
    function get_ids_by_location_type($location_type)
    {
        $location_id_maps = config('real-estate.frw.locations_id_maps');
        return $location_id_maps[$location_type] ?? null;
    }
}


if (!function_exists('sort_array_by_array')) {

    /**
     * @param $arr_to_sort
     * @param $sort_by_arr
     * @return mixed
     */
    function sort_array_by_array($arr_to_sort, $sort_by_arr)
    {
        $arr_new = $arr_to_sort;

        if (count($sort_by_arr) > 0) {
            $arr_new = [];
            foreach ($arr_to_sort as $index => $elem) {
                if (in_array($elem, $sort_by_arr)) {
                    $id = array_search($elem, $sort_by_arr);
                    $arr_new[$id] = $elem;
                    unset($arr_to_sort[$index]);
                }
            }
        }
        $arr_new = array_merge($arr_new, $arr_to_sort);
        ksort($arr_new);
        return $arr_new;
    }

}


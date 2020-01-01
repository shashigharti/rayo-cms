<?php

if (!function_exists('price_format')) {

    /**
     * @param integer $n
     * @param integer $precision
     * @return string
     */

    // Converts a number into a short version, eg: 1000 -> 1k
    // Reference: https://gist.github.com/RadGH/84edff0cc81e6326029c
    function price_format( $n, $precision = 1 ) {
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
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        return $n_format . $suffix;
    }
}

if (!function_exists('geocode')) {

    /**
     * @param string $address
     * @param integer $limit
     * @return array
     */
    function geocode( $address, $limit = 3 ) {
        if ($limit == 0) {
            return false;
        }
        $addressLatLong = [];
        $api_key = env('GOOGLE_API_KEY');
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


    
    if (!function_exists('email_template')) {
        /**
         * @param string $name
         * @return string
         */
        function email_template($name){
            return EmailTemplate::where('type', $name)->first();
        }
    }

    if (!function_exists('replace_variables')) {
        /**
         * @param string $content
         * @return string
         */
        function replace_variables($content, $user, $type){
            $agent = $user;
            $replacements = [
                'lead' => [
                    '*|LEAD_FIRSTNAME|*' => $user->memberable->first_name,
                    '*|LEAD_LASTNAME|*' => $user->memberable->last_name,
                    '*|LEAD_FULLNAME|*' => $user->memberable->first_name . " " . $user->memberable->last_name,
                    '*|LEAD_MAIL|*' => $user->email,
                    '*|LEAD_PHONE|*' => $user->memberable->phone,
                    '*|SITE_NAME|*' => config('rws.client.email.name'),
                    '*|PASSWORD|*' => $user->password,
                    '*|ACTIVATION_LINK|*' => '', //route('lead.import.mail', ['token' => $this->token]),
                    '*|UNSUBSCRIBE_LINK|*' => ''//'<a href="' . route('lead.unsubscribe', ['lead' => $this->lead->id]) . '">Unsubscribe</a>'
                ],
                'agent' => [
                    '*|AGENT_FIRSTNAME|*' => $agent->memberable->first_name,
                    '*|AGENT_LASTNAME|*' => $agent->memberable->last_name,
                    '*|AGENT_FULLNAME|*' => $user->memberable->first_name . " " . $user->memberable->last_name,
                    '*|AGENT_MAIL|*' => $agent->memberable->email,
                    '*|AGENT_PHONE|*' => $agent->memberable->phone,

                    '*|LISTING_STREET|*' => '',
                    '*|LISTING_NUMBER|*' =>  '',
                    '*|LISTING_SYSTEM_PRICE|*' => '',
                    '*|LISTING_NAME|*' => '',
                    '*|URL|*' => '',
                    '*|SUBJECT_THIS_EMAIL|*' => $this->data['subject'],
                    '*|LOGO|*' => $this->data['logo'],

                    '*|FIRST_VIEW|*' => '',
                    '*|VIEW_COUNT|*' => '',
                    '*|LISTING_VIEWER|*' => '',
                    '*|CONTENT|*' => '',
                    '*|SELLING_AGENT|*' => '',
                    '*|LOCATION_TYPE|*' => '',
                    '*|COUNT_LOCATION|*' => ''
                ]                
            ];

            $common = [
                '*|WEBSITE|*' => '<a href="' . \URL::to('/') . '">' . preg_replace('#^https?://#', '', \URL::to('/')) . '</a>',
                '*|SUBJECT_WEBSITE|*' => preg_replace('#^https?://#', '', \URL::to('/')),
                '*|FOOTER_TEXT|*' => '',
                '*|LOGO|*' => '<img style="max-width: 180px" src="" alt="">',
                '*|LOCATION|*' => config('rws.client.email.name')    
            ];

            $all_replacements = array_merge($replacements[$type], $common);
            foreach ($all_replacements as $search => $replace) {
                $content = str_replace($search, $replace, $content);
            }

            return $content;
        }
    }
}
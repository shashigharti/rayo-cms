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
}
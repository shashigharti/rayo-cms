<?php


namespace Robust\RealEstate\Helpers;


use Illuminate\Support\Facades\Log;


class GeoLocationHelper
{

    public function getCoordinates($address,$limit)
    {
        $api = env('GOOGLE_API_KEY');
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) .'&key=' .urlencode($api);
        try {
            $response = json_decode(file_get_contents($url),true);
            $status = $response['status'];
            if($status == 'OVER_QUERY_LIMIT') {
                Log::info('GeoLocationHelper : Query Limit exceeded');
                sleep(1);
                self::getCoordinates($address,$limit -1);
            } elseif($status == 'ZERO_RESULTS'){
                return false;
            }
            return isset($response['results'][0]) ? $response['results'][0] :  [];
        } catch (\Exception $er)
        {
            Log::info('GeoLocationHelper : ' . $er);
            return false;
        }
    }
}

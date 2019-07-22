<?php

namespace App\Http\Controllers;

use App\SurveyData;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class SurveyController
 * @package App\Http\Controllers
 */
class SurveyController extends Controller
{

    /**
     * @param $type
     * @param $id
     * @param \App\SurveyData $surveyData
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetails($type, $id, SurveyData $surveyData)
    {
        $response = [];
        $details = $surveyData->query();
        $details->select('latitude', 'longitude', 'family_details', 'id', 'ward_no', 'surveyor_name');
        $details->where('local_government', $id);
        $details->where('latitude', '<>', '');
        $details->where('longitude', '<>', '');


        $resp = $details->get()->toArray();
        $response = [];
        $response['maleCount'] = 0;
        $response['femaleCount'] = 0;
        // Process family details
        foreach ($resp as $key => $res) {
            $famDetails = json_decode($res['family_details'], true);
            if(is_array($famDetails)) {
                foreach ($famDetails as $famDetail) {
                    if(array_key_exists('gender', $famDetail)) {
                        $gender = $famDetail['gender'];
                        $gender === "1" ? $response['maleCount']++ : $response['femaleCount']++;
                    }

                    $x = [];
                    $x['latitude'] = $res['latitude'];
                    $x['longitude'] = $res['longitude'];
                    $x['surveyor_name'] = $res['surveyor_name'];
                    $x['caste_group'] = $famDetail['caste_group'];
                    $x['language_spoken'] = $famDetail['language_spoken'];
                    $x['last_name'] = $famDetail['last_name'];
                    $response[$key] = $x;
                }
            }
        }

        return response()->json($response);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFamilyDetailsConfig()
    {
        $config = config('family-details-config');
        return response()->json($config);
    }

    /**
     * @param \App\SurveyData $surveyData
     * @return \Illuminate\Http\JsonResponse
     */
    public function totalSurveyors(SurveyData $surveyData)
    {
        $surveyors_count = DB::table('survey_data')->select('surveyor_name',DB::raw('COUNT(surveyor_name) as count'))
        ->groupBy('surveyor_name')
        ->orderBy('count', 'DESC')
        ->get()->toArray(); 
        
        return response()->json($surveyors_count); 
    }

    /**
     * @param \App\User $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getTotalUsers(User $user)
    {
        $totalUsers = $user->all()->count();
        return response()->json($totalUsers);
    }

    /**
     * @param \App\User $user
     * @param \Carbon\Carbon $carbon
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWeeklyActiveUsers(User $user, Carbon $carbon)
    {
        $lastWeek = $carbon->today()->subWeek()->format('Y-m-d h:i:s');
        $weeklyActiveUsers = $user->where('last_active_at', '>=', $lastWeek)->get();
        return response()->json($weeklyActiveUsers);
    }

    /**
     * @param \App\SurveyData $surveyData
     * @param \Carbon\Carbon $carbon
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDailyWeeklySubmissions(SurveyData $surveyData, Carbon $carbon)
    {
        $lastWeek = $carbon->now()->subWeek()->format('Y-m-d h:i:s');
        $today = $carbon->today()->format('Y-m-d h:i:s');
        $tomorrow = $carbon->tomorrow()->format('Y-m-d h:i:s');

        $weeklySubmissions = $surveyData->where('created_at', '>=', $lastWeek)
            ->where('created_at', '<=', $today)->get();
        $dailySumissions = $surveyData->where('created_at', '>=', $today)
            ->where('created_at', '<=', $tomorrow)->get();
        return response()->json(['weeklySubmissions' => $weeklySubmissions, 'dailySubmissions' => $dailySumissions]);
    }


    /**
     * @param \App\SurveyData $surveyData
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getTotalPopulation(SurveyData $surveyData)
    {
        $count = 0;
        foreach($surveyData->on('mysql-unbuffered')->cursor() as $survey) {
            $count += (int) $survey->family_count + 1;
        }
        return response()->json($count);
    }

    /**
     * @param \App\SurveyData $surveyData
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getHouseholdCount(SurveyData $surveyData)
    {
        $count = 0;
        foreach($surveyData->on('mysql-unbuffered')->cursor() as $survey) {
            $count++;
        }
        return response()->json($count);
    }

    /**
     * @param \App\SurveyData $surveyData
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotalMaleFemale(SurveyData $surveyData)
    {
        $maleCount = 0;
        $femaleCount = 0;
        foreach($surveyData->on('mysql-unbuffered')->cursor() as $survey) {
            $details = json_decode($survey->family_details, true);
            if(is_array($details)) {
                foreach ($details as $detail) {
                    if(array_key_exists('gender', $detail)) {
                        $gender = $detail['gender'];
                        $gender === "1" ? $maleCount++ : $femaleCount++;
                    }
                }
            }
        }
        return response()->json(['male' => $maleCount, 'female' => $femaleCount]);
    }

}

<?php

namespace App\Http\Controllers;

use App\LocalGovernment;
use App\ProfileReport;

/**
 * Class ProfileReportsController
 * @package App\Http\Controllers
 */
class ProfileReportsController extends Controller
{

    /**
     * @param $local_government_id
     * @param \App\ProfileReport $profileReport
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfileReport($local_government_id,ProfileReport $profileReport)
    {
        $reports = $profileReport->where('local_government_id', $local_government_id)->get()->toArray();
        return response()->json($reports);
    }

    /**
     * @param \App\LocalGovernment $localGovernment
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllLocalGovernments(LocalGovernment $localGovernment)
    {
        $allGovernments = $localGovernment->all()->toArray();
        return response()->json($allGovernments);
    }
}

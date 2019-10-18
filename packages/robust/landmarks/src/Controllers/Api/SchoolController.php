<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Landmarks\Models\ElemSchool;
use Robust\Landmarks\Resources\ElemSchool as ElemSchoolResource;

use Robust\Landmarks\Models\MiddleSchool;
use Robust\Landmarks\Resources\MiddleSchool as MiddleSchoolResource;

use Robust\Landmarks\Models\HighSchool;
use Robust\Landmarks\Resources\HighSchool as HighSchoolResource;



/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class SchoolController extends Controller
{

    /**
     * @param \Robust\Landmarks\Model\ElemSchool $elemSchool
     * @param \Robust\Landmarks\Model\MiddleSchool $middleSchool
     * @param \Robust\Landmarks\Model\HighSchool $highSchool
     * @return array
     */
    public function getSchoolRegions(ElemSchool $elemSchool, MiddleSchool $middleSchool, HighSchool $highSchool)
    {
        return array(
          'elem_schools' => ElemSchoolResource::collection($elemSchool->orderBy('name', 'asc')->get()),
          'middle_schools' => MiddleSchoolResource::collection($middleSchool->orderBy('name', 'asc')->get()),
          'high_schools' => HighSchoolResource::collection($highSchool->orderBy('name', 'asc')->get()),
        );
    }

    /**
     * @param \Robust\Landmarks\Model\ElemSchool $elemSchool
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getElemSchools(ElemSchool $elemSchool)
    {
        return ElemSchoolResource::collection(
            $elemSchool->orderBy('name', 'asc')->get()
        );
    }

    /**
     * @param \Robust\Landmarks\Model\MiddleSchool $middleSchool
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getMiddleSchools(MiddleSchool $middleSchool)
    {
        return MiddleSchoolResource::collection(
            $middleSchool->orderBy('name', 'asc')->get()
        );
    }

    /**
     * @param \Robust\Landmarks\Model\HighSchool $highSchool
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getHighSchools(HighSchool $highSchool)
    {
        return HighSchoolResource::collection(
            $highSchool->orderBy('name', 'asc')->get()
        );
    }
}



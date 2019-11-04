<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Models\ElemSchool;
use Robust\RealEstate\Resources\ElemSchool as ElemSchoolResource;

use Robust\RealEstate\Models\MiddleSchool;
use Robust\RealEstate\Resources\MiddleSchool as MiddleSchoolResource;

use Robust\RealEstate\Models\HighSchool;
use Robust\RealEstate\Resources\HighSchool as HighSchoolResource;


/**
 * Class SchoolController
 * @package Robust\RealEstate\Controllers\Api
 */
class SchoolController extends Controller
{


    /**
     * @param ElemSchool $elemSchool
     * @param MiddleSchool $middleSchool
     * @param HighSchool $highSchool
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



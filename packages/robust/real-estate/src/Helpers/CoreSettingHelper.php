<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\CoreSetting;
use Robust\RealEstate\Repositories\Website\CoreSettingRepository;


class CoreSettingHelper
{
    /**
     * @var
     */
    private $settings;


    public function __construct(CoreSettingRepository $model)
    {
        $this->settings = $model;
    }

    /**
     * @return collection
     */
    public function all()
    {
        return $this->settings;
    }


    /**
     * @param $type
     * @return mixed
     */
    public function getSettingByType($type)
    {
        $values=[];
        $setting = $this->settings->byType($type)->first();
        if($setting){
            $values = json_decode($setting->values,true);
        }
        return $values;
    }
}

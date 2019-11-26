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
        $setting = $this->settings->where('type', $type)->first();
        return json_decode($setting->values,true);
    }
}

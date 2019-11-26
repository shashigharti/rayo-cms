<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\CoreSetting;


/**
 * Class CoreSettingRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class CoreSettingRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var CoreSetting
     */
    protected $model;


    /**
     * CoreSettingRepository constructor.
     * @param CoreSetting $model
     */
    public function __construct(CoreSetting $model)
    {
        $this->model = $model;
    }
}


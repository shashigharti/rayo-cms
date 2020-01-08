<?php
namespace Robust\Core\Repositories\API;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\Core\Models\Setting;


/**
 * Class SettingsRepository
 * @package Robust\Core\Repositories\API
 */
class SettingsRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Setting
     */
    protected $model;

    /**
     * SettingsRepository constructor.
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        $this->model = $model;
    }
}

<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\MlsLog;


/**
 * Class MlsLogRepository
 * @package Robust\Mls\Repositories\Admin
 */
class MlsLogRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * MlsLogRepository constructor.
     * @param MlsLog $model
     */
    public function __construct(MlsLog $model)
    {
        $this->model = $model;
    }
}

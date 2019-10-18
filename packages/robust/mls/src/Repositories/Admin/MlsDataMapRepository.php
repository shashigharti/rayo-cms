<?php
namespace Robust\Mls\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Mls\Models\MlsDataMap;

/**
 * Class MlsUserRepository
 * @package Robust\Mls\Repositories\Admin
 */
class MlsDataMapRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * MlsUserRepository constructor.
     * @param MlsUser $model
     */
    public function __construct(MlsDataMap $model)
    {
        $this->model = $model;
    }
}
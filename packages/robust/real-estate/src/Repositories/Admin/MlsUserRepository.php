<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\MlsUser;

/**
 * Class MlsUserRepository
 * @package Robust\Mls\Repositories\Admin
 */
class MlsUserRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * MlsUserRepository constructor.
     * @param MlsUser $model
     */
    public function __construct(MlsUser $model)
    {
        $this->model = $model;
    }
}

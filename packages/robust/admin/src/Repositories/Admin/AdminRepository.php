<?php

namespace Robust\Admin\Repositories\Admin;


use Robust\Admin\Models\Admin;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;

/**
 * Class UserRepository
 * @package Robust\Admin\Repositories\Admin
 */
class AdminRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Admin
     */
    protected $model;

    /**
     * AdminRepository constructor.
     * @param Admin $model
     */
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }
}

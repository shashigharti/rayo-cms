<?php

namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\CoreGroup;

/**
 * Class GroupRepository
 */
class GroupRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;
    /**
     * @var CoreGroup
     */
    protected $model;

    /**
     * GroupRepository constructor.
     * @param CoreGroup $model
     */
    public function __construct(CoreGroup $model)
    {
        $this->model =$model;
    }
}

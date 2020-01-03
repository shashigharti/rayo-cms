<?php

namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
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

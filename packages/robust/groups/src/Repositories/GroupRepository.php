<?php

namespace Robust\Groups\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Groups\Model\CoreGroup;

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

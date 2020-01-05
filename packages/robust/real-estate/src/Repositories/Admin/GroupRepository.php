<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\LeadGroup;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


class GroupRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    
    public function __construct(LeadGroup $model)
    {
        $this->model = $model;
    }
}

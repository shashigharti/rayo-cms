<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\LeadGroup;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


/**
 * Class GroupRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class GroupRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * GroupRepository constructor.
     * @param LeadGroup $model
     */
    public function __construct(LeadGroup $model)
    {
        $this->model = $model;
    }
}

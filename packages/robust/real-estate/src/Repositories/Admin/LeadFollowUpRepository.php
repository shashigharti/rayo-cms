<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadFollowup;

/**
 * Class LeadFollowUpRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadFollowUpRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * LeadFollowUpRepository constructor.
     * @param LeadFollowup $model
     */
    public function __construct(LeadFollowup $model)
    {
        $this->model = $model;
    }
}

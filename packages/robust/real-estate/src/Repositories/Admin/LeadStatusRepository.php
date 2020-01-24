<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadStatus;


/**
 * Class LeadStatusRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadStatusRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var LeadStatus
     */
    protected $model;

    /**
     * LeadStatusRepository constructor.
     * @param LeadStatus $model
     */
    public function __construct(LeadStatus $model)
    {
        $this->model = $model;
    }
}

<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadFollowup;


/**
 * Class LeadFollowUpRepository
 * @package Robust\RealEstate\Repositories\Api
 */
class LeadFollowUpRepository
{


    /**
     * @var LeadFollowup
     */
    protected $model;
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

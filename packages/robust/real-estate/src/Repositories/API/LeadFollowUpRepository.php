<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\API\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\API\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\API\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadFollowup;


/**
 * Class LeadFollowUpRepository
 * @package Robust\RealEstate\Repositories\API
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

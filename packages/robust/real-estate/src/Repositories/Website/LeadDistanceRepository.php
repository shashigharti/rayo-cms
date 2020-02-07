<?php

namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\API\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Models\LeadDistance;


/**
 * Class LeadDistanceRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class LeadDistanceRepository
{
    use  CommonRepositoryTrait,CrudRepositoryTrait;

    /**
     * @var LeadDistance
     */
    protected $model;


    /**
     * LeadDistanceRepository constructor.
     * @param LeadDistance $model
     */
    public function __construct(LeadDistance $model)
    {
        $this->model = $model;
    }
}

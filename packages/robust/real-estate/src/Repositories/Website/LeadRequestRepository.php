<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadRequest;


/**
 * Class LeadRequestRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class LeadRequestRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var LeadRequest
     */
    protected $model;


    /**
     * LeadRequestRepository constructor.
     * @param LeadRequest $model
     */
    public function __construct(LeadRequest $model)
    {
        $this->model = $model;
    }

}
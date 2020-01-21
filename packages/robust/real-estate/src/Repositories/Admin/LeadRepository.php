<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Lead;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


/**
 * Class LeadRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * LeadRepository constructor.
     * @param Lead $model
     */
    public function __construct(Lead $model)
    {
        $this->model = $model;
    }
}

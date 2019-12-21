<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Website\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Lead;

/**
 * Class LeadRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class LeadRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Lead
     */
    protected $model;

    /**
     * LeadRepository constructor.
     * @param Lead $model
     */
    public function __construct(Lead $model)
    {
        $this->model = $model;
    }

}

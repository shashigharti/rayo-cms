<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadSearch;

/**
 * Class LeadSearchRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadSearchRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;
    /**
     * @var LeadSearch
     */
    protected $model;

    /**
     * LeadSearchRepository constructor.
     * @param LeadSearch $model
     */
    public function __construct(LeadSearch $model)
    {
        $this->model=$model;
    }
}

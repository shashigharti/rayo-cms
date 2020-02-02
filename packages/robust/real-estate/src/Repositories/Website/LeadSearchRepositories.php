<?php
namespace Robust\RealEstate\Repositories\Website;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadSearch;

/**
 * Class LeadSearchRepositories
 * @package Robust\RealEstate\Repositories\Website
 */
class LeadSearchRepositories
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var LeadSearch
     */
    protected $model;

    /**
     * LeadSearchRepositories constructor.
     * @param LeadSearch $model
     */
    public function __construct(LeadSearch $model)
    {
        $this->model = $model;
    }
}

<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadRating;

/**
 * Class LeadRatingsRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadRatingsRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * LeadRatingsRepository constructor.
     * @param LeadRating $model
     */
    public function __construct(LeadRating $model)
    {
        $this->model = $model;
    }
}

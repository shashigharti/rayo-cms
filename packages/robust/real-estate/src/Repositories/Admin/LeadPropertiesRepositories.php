<?php
namespace Robust\RealEstate\Repositories\Admin;


use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadProperty;


/**
 * Class LeadPropertiesRepositories
 * @package Robust\RealEstate\Repositories\API
 */
class LeadPropertiesRepositories
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var LeadProperty
     */
    protected $model;

    /**
     * LeadPropertiesRepositories constructor.
     * @param LeadProperty $model
     */
    public function __construct(LeadProperty $model)
    {
        $this->model=$model;
    }

}

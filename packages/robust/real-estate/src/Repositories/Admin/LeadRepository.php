<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Lead;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


class LeadRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    
    public function __construct(Lead $model)
    {
        $this->model = $model;
    }
}

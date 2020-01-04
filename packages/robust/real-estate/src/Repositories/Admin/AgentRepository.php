<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Agent;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


class AgentRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    
    public function __construct(Banner $model)
    {
        $this->model = $model;
    }
}

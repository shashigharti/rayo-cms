<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Agent;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


/**
 * Class AgentRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class AgentRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * AgentRepository constructor.
     * @param Agent $model
     */
    public function __construct(Agent $model)
    {
        $this->model = $model;
    }
}

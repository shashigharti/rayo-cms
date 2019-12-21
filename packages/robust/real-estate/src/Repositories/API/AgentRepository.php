<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\API\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\API\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\API\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Website\Agent;


/**
 * Class AgentRepository
 * @package Robust\RealEstate\Repositories\API
 */
class AgentRepository
{

    /**
     * @var Agent
     */
    protected $model;
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

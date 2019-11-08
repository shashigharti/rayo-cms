<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Admin\Models\User;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;


/**
 * Class AgentRepository
 * @package Robust\RealEstate\Repositories\Api
 */
class AgentRepository
{
    /**
     * @var User
     */
    protected $model;
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * AgentRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}

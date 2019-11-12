<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\CoreEmailTemplate;


/**
 * Class CoreEmailRepository
 * @package Robust\RealEstate\Repositories\Api
 */
class CoreEmailRepository
{
    /**
     * @var CoreEmailTemplate
     */
    protected $model;
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * CoreEmailRepository constructor.
     * @param CoreEmailTemplate $model
     */
    public function __construct(CoreEmailTemplate $model)
    {
        $this->model = $model;
    }
}

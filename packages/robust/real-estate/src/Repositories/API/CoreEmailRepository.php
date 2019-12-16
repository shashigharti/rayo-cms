<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\CoreEmailTemplate;


/**
 * Class CoreEmailRepository
 * @package Robust\RealEstate\Repositories\API
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
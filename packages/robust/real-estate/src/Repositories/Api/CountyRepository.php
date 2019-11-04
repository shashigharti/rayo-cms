<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\County;


class CountyRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;



    public function __construct(County $model)
    {
        $this->model = $model;
    }
}

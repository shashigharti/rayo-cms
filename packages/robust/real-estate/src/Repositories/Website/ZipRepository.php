<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Zip;


/**
 * Class ZipRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ZipRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Zip
     */
    protected $model;


    /**
     * ZipRepository constructor.
     * @param Zip $model
     */
    public function __construct(Zip $model)
    {
        $this->model = $model;
    }
}

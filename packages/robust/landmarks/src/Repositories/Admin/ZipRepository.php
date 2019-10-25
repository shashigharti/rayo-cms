<?php
namespace Robust\LandMarks\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Landmarks\Models\Zip;


/**
 * Class ZipRepository
 * @package Robust\LandMarks\Repositories\Admin
 */
class ZipRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * ZipRepository constructor.
     * @param Zip $model
     */
    public function __construct(Zip $model)
    {
        $this->model = $model;
    }
}

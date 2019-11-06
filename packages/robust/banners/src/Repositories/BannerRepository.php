<?php
namespace Robust\Banners\Repositories;

use Robust\Banners\Models\Banner;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;

/**
 * Class BannerRepository
 * @package Robust\Banners\Repositories
 */
class BannerRepository
{

    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * BannerRepository constructor.
     * @param Banner $model
     */
    public function __construct(Banner $model)
    {
        $this->model = $model;
    }
}

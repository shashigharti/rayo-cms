<?php
namespace Robust\Banners\Repositories;

use Robust\Banners\Models\Banner;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;

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

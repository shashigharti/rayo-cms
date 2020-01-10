<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Page;

/**
 * Class PageRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class PageRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * PageRepository constructor.
     * @param Page $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function searchContent($data)
    {
        $page = $this->model->where('name', 'like', '%' . $data['keyword'] . '%')
            ->orWhere('excerpt_ne', 'like', '%' . $data['keyword'] . '%')
            ->orWhere('name_ne', 'like', '%' . $data['keyword'] . '%')
            ->orWhere('excerpt', 'like', '%' . $data['keyword'] . '%')
            ->orWhere('content', 'like', '%' . $data['keyword'] . '%')
            ->orWhere('content_ne', 'like', '%' . $data['keyword'] . '%')
            ->get();
        return $page;
    }
}

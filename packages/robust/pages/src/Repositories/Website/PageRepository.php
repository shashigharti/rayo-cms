<?php
namespace Robust\Pages\Website\Repositories;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;
use Robust\Pages\Models\Page;

/**
 * Class PageRepository
 * @package Robust\Pages\Website\Repositories
 */
class PageRepository
{
    use SearchRepositoryTrait, CommonRepositoryTrait;

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

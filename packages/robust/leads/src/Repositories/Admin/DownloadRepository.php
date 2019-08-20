<?php
namespace Robust\Pages\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Pages\Models\PageDownload;

/**
 * Class DownloadRepository
 * @package Robust\Pages\Repositories\Admin
 */
class DownloadRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * DownloadRepository constructor.
     * @param PageDownload $model
     */
    public function __construct(PageDownload $model)
    {
        $this->model = $model;
    }
}

<?php
namespace Robust\Core\Repositories\Admin;

use Robust\Core\Models\Command;
use Robust\Core\Repositories\Admin\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Admin\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Admin\Traits\SearchRepositoryTrait;

/**
 * Class ReportRepository
 * @package Robust\Core\Repositories
 */
class CommandRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * ReportRepository constructor.
     * @param Report $report
     */
    public function __construct(Command $command)
    {
        $this->model = $command;
    }
}
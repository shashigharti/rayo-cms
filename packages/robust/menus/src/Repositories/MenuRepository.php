<?php
namespace Robust\Leads\Repositories\Admin;


use Robust\Core\Models\Menu;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;


/**
 * Class MenuRepository
 * @package Robust\Leads\Repositories\Admin
 */
class MenuRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Menu
     */
    protected $model;


    /**
     * MenuRepository constructor.
     * @param Menu $model
     */
    public function __construct(Menu $model)
    {
        $this->model=$model;
    }
}

<?php
namespace Robust\Menus\Repositories\Admin;


use Robust\Menus\Models\Menu;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;


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

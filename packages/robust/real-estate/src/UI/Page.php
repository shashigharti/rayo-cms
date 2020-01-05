<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class Page
 * @package Robust\Pages\UI
 */
class Page extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "pages";
    /**
     * @var array
     */
    public $columns = [
        'title' => 'Title',
        'slug' => 'Slug',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Edit',
                'url' => "admin.pages.edit",
                'permission' => 'real-estate.pages.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-delete"></i> Delete',
                'url' => "admin.pages.destroy",
                'permission' => 'real-estate.pages.delete'
            ]
        ]
    ];
     /**
     * @var array
     */
    public $left_menu = [
        
    ];

    /**
     * @var array
     */
    public $right_menu = [
        'add' => [
            'display_name' => 'Add', 'url' => 'admin.pages.create', 'permission' => 'real-estate.pages.add', 'icon' => 'add'
        ]
    ];
    /**
     * @var array
     */
    public $addrules = [
        'title' => 'required',
        'slug' => 'required| unique:pages'
    ];
    /**
     * @var array
     */
    public $editrules = [];
    /**
     * @param $category
     * @return array
     */
    public function getRoute($category)
    {
        return $category->exists ? ['admin.pages.update', $category->id] : ['admin.pages.store'];
    }
    /**
     * @return string
     */
    public function getModel()
    {
        return 'Robust\RealEstate\Models\Page';
    }
    /**
     * @param $model
     * @return array
     */
    public function getTabs($model)
    {
        return [
            'Page' => ['url' => route('admin.pages.edit', [$model->id]), 'permission' => 'real-estate.pages.manage']
        ];
    }
}
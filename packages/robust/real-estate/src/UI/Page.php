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
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.pages.edit",
                'permission' => 'real-estate.pages.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
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
        'slug' => 'required| unique:real_estate_pages'
    ];
    /**
     * @var array
     */
    public $editrules = [];

    /**
     * @return string
     */
    public function getModel()
    {
        return 'Robust\RealEstate\Models\Page';
    }
}
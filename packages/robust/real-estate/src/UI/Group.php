<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class Group
 * @package Robust\RealEstate\UI
 */
class Group extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "groups";
    /**
     * @var array
     */
    public $columns = [
        'name' => 'Group Name',
        'color' => 'Color',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.groups.edit",
                'permission' => 'real-estate.groups.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.groups.destroy",
                'permission' => 'real-estate.groups.delete'
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
            'display_name' => 'Add', 'url' => 'admin.groups.create', 'permission' => 'real-estate.groups.add', 'icon' => 'add'
        ]
    ];
    /**
     * @var array
     */
    public $addrules = [
        'name' => 'required',
        'color' => 'required'
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
        return $category->exists ? ['admin.groups.update', $category->id] : ['admin.groups.store'];
    }
    /**
     * @return string
     */
    // public function getModel()
    // {
    //     return 'Robust\RealEstate\Models\Lead';
    // }
}
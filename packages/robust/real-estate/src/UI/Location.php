<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class Location
 * @package Robust\RealEstate\UI
 */
class Location extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "locations";
    /**
     * @var array
     */
    public $columns = [
        'name' => 'Name',
        'slug' => 'slug',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.groups.edit",
                'permission' => 'real-estate.locations.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.locations.destroy",
                'permission' => 'real-estate.locations.delete'
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
            'display_name' => 'Add', 'url' => 'admin.locations.create', 'permission' => 'real-estate.locations.add', 'icon' => 'add'
        ]
    ];
    /**
     * @var array
     */
    public $addrules = [
        'first_name' => 'required',
        'last_name' => 'required'
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
        return $category->exists ? ['admin.locations.update', $category->id] : ['admin.locations.store'];
    }
    /**
     * @return string
     */
    // public function getModel()
    // {
    //     return 'Robust\RealEstate\Models\Lead';
    // }
}
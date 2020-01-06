<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class Attribute
 * @package Robust\RealEstate\UI
 */
class Attribute extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "attributes";
    /**
     * @var array
     */
    public $columns = [
        'property_name' => 'property_name',
        'name' => 'name',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.attributes.edit",
                'permission' => 'real-estate.attributes.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.attributes.destroy",
                'permission' => 'real-estate.attributes.delete'
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
            'display_name' => 'Add', 'url' => 'admin.attributes.create', 'permission' => 'real-estate.attributes.add', 'icon' => 'add'
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
        return $category->exists ? ['admin.attributes.update', $category->id] : ['admin.attributes.store'];
    }
    /**
     * @return string
     */
    // public function getModel()
    // {
    //     return 'Robust\RealEstate\Models\Lead';
    // }
}
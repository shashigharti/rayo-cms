<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class Lead
 * @package Robust\RealEstate\UI
 */
class Lead extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "leads";
    /**
     * @var array
     */
    public $columns = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.leads.edit",
                'permission' => 'real-estate.leads.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.leads.destroy",
                'permission' => 'real-estate.leads.delete'
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
            //'display_name' => 'Add', 'url' => 'admin.leads.create', 'permission' => 'real-estate.leads.add', 'icon' => 'add'
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
        return $category->exists ? ['admin.leads.update', $category->id] : ['admin.leads.store'];
    }
    /**
     * @return string
     */
    // public function getModel()
    // {
    //     return 'Robust\RealEstate\Models\Lead';
    // }
}
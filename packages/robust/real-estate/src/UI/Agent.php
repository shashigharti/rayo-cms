<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class Agent
 * @package Robust\RealEstate\UI
 */
class Agent extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "agents";
    /**
     * @var array
     */
    public $columns = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.agents.edit",
                'permission' => 'real-estate.agents.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.agents.destroy",
                'permission' => 'real-estate.agents.delete'
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
            'display_name' => 'Add', 'url' => 'admin.agents.create', 'permission' => 'real-estate.agents.add', 'icon' => 'add'
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
        return $category->exists ? ['admin.agents.update', $category->id] : ['admin.agents.store'];
    }
    /**
     * @return string
     */
    // public function getModel()
    // {
    //     return 'Robust\RealEstate\Models\Lead';
    // }
}
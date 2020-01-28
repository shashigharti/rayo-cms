<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;


/**
 * Class Status
 * @package Robust\RealEstate\UI
 */
class Status extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "status";
    /**
     * @var array
     */
    public $columns = [
        'value' => 'Status Name',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.status.edit",
                'permission' => 'real-estate.status.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.status.destroy",
                'permission' => 'real-estate.status.delete'
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
            'display_name' => 'Add', 'url' => 'admin.status.create', 'permission' => 'real-estate.status.add', 'icon' => 'add'
        ]
    ];
    /**
     * @var array
     */
    public $addrules = [
        'value' => 'required',
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
        return $category->exists ? ['admin.status.update', $category->id] : ['admin.status.store'];
    }
    /**
     * @return string
     */
    // public function getModel()
    // {
    //     return 'Robust\RealEstate\Models\Lead';
    // }
}

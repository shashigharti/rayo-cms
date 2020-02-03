<?php

namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class EmailTemplate
 * @package Robust\RealEstate\UI
 */
class EmailTemplate extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "email-templates";
    /**
     * @var array
     */
    public $columns = [
        'name' => 'Name',
        'subject' => 'Subject',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.email-templates.edit",
                'permission' => 'real-estate.email-templates.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i>',
                'url' => "admin.email-templates.destroy",
                'permission' => 'real-estate.email-templates.delete'
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
            'display_name' => 'Add', 'url' => 'admin.email-templates.create', 'permission' => 'real-estate.email-templates.add', 'icon' => 'add'
        ]
    ];
    /**
     * @var array
     */
    public $addrules = [
        'name' => 'required',
        'type' => 'required'
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
        return $category->exists ? ['admin.email-templates.update', $category->id] : ['admin.email-templates.store'];
    }
    /**
     * @return string
     */
     public function getModel()
     {
         return 'Robust\RealEstate\Models\EmailTemplate';
     }

    /**
     * @param $model
     * @return array
     */
    public function getTabs($model)
    {
        return [
            'Email Template' => ['url' => route('admin.email-templates.edit', [$model->id]), 'permission' => 'real-estate.email-templates.edit'],
            'Preview' => [
                'url' => route('admin.email-templates.preview', [$model->id]),
                'permission' => 'real-estate.email-templates.edit'
            ],
        ];

    }
}

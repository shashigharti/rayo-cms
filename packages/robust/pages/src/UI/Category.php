<?php
namespace Robust\Pages\UI;

use Robust\Core\UI\Core\BaseUI;
use Robust\Pages\Models\Category as Model;

/**
 * Class Category
 * @package Robust\Pages\UI
 */
class Category extends BaseUI
{
    protected $route_name = "pagecategories";
    /**
     * @var array
     */
    public $columns = [
        'name' => 'Name',
        'Description' => ['callback' => 'Description'],
        'Pages' => ['callback' => 'Pages'],

        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Edit',
                'url' => "admin.pagecategories.edit",
                'permission' => 'pages.categories.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-delete"></i> Delete',
                'url' => "admin.pagecategories.destroy",
                'permission' => 'pages.categories.delete'
            ]
        ]
    ];


    /**
     * @var array
     */
    public $left_menu = [
        'add' => ['display_name' => 'Add', 'url' => 'admin.pagecategories.create', 'permission' => 'pages.categories.add'],
        'export' => ['display_name' => 'Export', 'url' => 'admin.categories.export', 'permission' => 'pages.categories.export'],
        'import' => ['display_name' => 'Import', 'url' => 'admin.categories.import', 'permission' => 'pages.categories.import']


    ];

    /**
     * @var array
     */
    public $addrules = [
        'name' => 'required',
        'slug' => 'required| unique:pages_categories',
        'description' => 'required',
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
        return $category->exists ? ['admin.pagecategories.update', $category->id] : ['admin.pagecategories.store'];
    }


    /**
     * @param $params
     * @return string
     */
    public function getDescription($params)
    {
        return str_limit(strip_tags($params['description']), 40);
    }

    /**
     * @param $params
     * @return string
     */
    public function getPages($params)
    {
        $category = Model::find($params['id']);
        return '<a href="' . route("admin.pagecategories.pages", [$params['id']]) . '"><span class="badge form-badge">' . $category->pages()->count() . '</span></a> ';
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return 'Robust\Pages\Models\Category';
    }

}

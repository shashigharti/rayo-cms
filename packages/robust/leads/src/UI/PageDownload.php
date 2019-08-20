<?php
namespace Robust\Pages\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class PageDownload
 * @package Robust\Pages\UI
 */
class PageDownload extends BaseUI
{

    /**
     * @var array
     */
    public $columns = [
        'name' => 'Name',
        'File' => ['callback' => 'File'],

        'Description' => ['callback' => 'Description'],

        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Edit',
                'url' => 'admin.page.downloads.edit',
                'permission' => 'pages.downloads.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-delete"></i> Delete',
                'url' => 'admin.page.downloads.destroy',
                'permission' => 'pages.downloads.delete'
            ]
        ]
    ];

    /**
     * @var array
     */
    public $right_menu = [
      
    ];

    /**
     * @var array
     */
    public $left_menu = [
        'add' => ['display_name' => 'Add', 'url' => 'admin.page.downloads.create', 'permission' => 'pages.downloads.add'],
        'import' => ['display_name' => 'Import', 'url' => 'admin.page.downloads.import', 'permission' => 'pages.downloads.import']

    ];

    /**
     * @var array
     */
    public $addrules = [
        'name' => 'required',
        'file' => 'required',

    ];

    /**
     * @var array
     */
    public $editrules = [];

    /**
     * @param $model
     * @return array
     */
    public function getRoute($model)
    {
        return $model->exists ? ['admin.page.downloads.update', $model->id] : ['admin.page.downloads.store'];
    }

    /**
     * @param $params
     * @return string
     */
    public function getFile($params)
    {
        return '<a href="' . $params['file'] . '" download>' . $params['file'] . '</a>';
    }

    /**
     * @param $params
     * @return string
     */
    public function getDescription($params)
    {
        return str_limit(strip_tags($params['description']), 60);
    }
}

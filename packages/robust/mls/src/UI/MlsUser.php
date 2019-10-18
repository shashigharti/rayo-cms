<?php
namespace Robust\Mls\UI;

use Robust\Core\UI\Core\BaseUI;

/**
 * Class MlsUser
 * @package Robust\Mls\UI
 */
class MlsUser extends BaseUI
{
    /**
     * @var string
     */
    protected $route_name = "mlsuser";

    /**
     * @var array
     */
    public $columns = [
        'name' => 'Name',
        'slug' => 'Slug',
        'email' => 'Email',
        'website' => 'Website',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Edit',
                'url' => "admin.mlsuser.edit",
                'permission' => 'mls.manage'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-delete"></i> Delete',
                'url' => "admin.mlsuser.destroy",
                'permission' => 'mls.manage'
            ],
            'generate' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Generate',
                'url' => "admin.mlsuser.generate",
                'permission' => 'mls.manage'
            ],
            'pull' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Pull',
                'url' => "admin.mls.data.pull",
                'permission' => 'mls.manage'
            ],
            'Fill' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Fill',
                'url' => "admin.mls.data.fill",
                'permission' => 'mls.manage'
            ]
        ]
    ];
    /**
     * @var array
     */
    public $left_menu = [
        'add' => ['display_name' => 'Add', 'url' => 'admin.mlsuser.create', 'permission' => 'mls.manage']
    ];

    /**
     * @var array
     */
    public $addrules = [

    ];
    /**
     * @var array
     */
    public $editrules = [

    ];

    /**
     * @param $mlsuser
     * @return array
     */
    public function getRoute($mlsuser)
    {
        return $mlsuser->exists ? ['admin.mlsuser.update', $mlsuser->id] : ['admin.mlsuser.store'];
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return 'Robust\Mls\Models\MlsUser';
    }

    /**
     * @param $model
     * @return array
     */
    public function getTabs($model)
    {
        return [
            'General' =>['url' => route('admin.mlsuser.edit',[$model->id]),'permission' =>'mls.manage'],
            'Data Map' =>['url' => route('admin.mlsuser.data-map',[$model->id]),'permission' =>'mls.manage'],
            'Mls Query' =>['url' => route('admin.mlsuser.query',[$model->id]),'permission' =>'mls.manage'],
            'Data Re-Map' =>['url' => route('admin.mlsuser.data-remap',[$model->id]),'permission' =>'mls.manage'],
            'Additional Data' =>['url' => route('admin.mlsuser.other-data',[$model->id]),'permission' =>'mls.manage'],
            'Field Details' =>['url' => route('admin.mlsuser.field-details',[$model->id]),'permission' =>'mls.manage'],
            'Log' =>['url' => route('admin.mlslog.index',[$model->id]),'permission' =>'mls.manage'],
        ];
    }

}
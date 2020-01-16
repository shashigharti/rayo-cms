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
     * @param $model
     * @return array
     */
    public function getTabs($model)
    {
        return [
            'Overview' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'overview'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Communications' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'communications'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Notes' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'notes'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Views/Favs' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'views-favs'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Searches' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'searches'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Bookmarks' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'bookmarks'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Reports' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'reports'
                ]),
                'permission' => 'real-estate.leads.edit'
            ],
            'Alerts' => [
                'url' => route('admin.leads.details', [
                    'id' => $model->id,
                    'type' => 'alerts'
                ]),
                'permission' => 'real-estate.leads.edit'
            ]

        ];

    }
}

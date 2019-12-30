<?php
namespace Robust\RealEstate\UI;

use Robust\Core\UI\Traits\RouteTrait;

/**
 * Class Image
 * @package Robust\RealEstate\UI
 */
class Image
{
    use RouteTrait;

    /**
     * BannerImage constructor.
     * @param null $params
     */
    function __construct($params = null)
    {
        $this->params = $params;
    }

    /**
     * @var array
     */
    public $columns = [
        'Image' => ['callback' => 'Image'],
        'Description' => ['callback' => 'Description'],

        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Edit',
                'url' => "admin.banner.images.edit",
                'permission' => 'banners.add'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-delete"></i> Delete',
                'url' => 'admin.banner.images.destroy',
                'permission' => 'banners.add'
            ]
        ]
    ];

    /**
     * @var array
     */
    public $left_menu = [
        // 'add' => ['display_name' => 'Add', 'url' =>  'admin.banner.images.create', 'permission' => 'forms.group.add']
    ];

    /**
     * @var array
     */
    public $addrules = [
        'media_id' => 'required',
    ];

    /**
     * @var array
     */
    public $editrules = [];

    /**
     * @param $model
     * @return string
     */
    public function getMethod($model)
    {
        return $model->exists ? 'PUT' : 'POST';
    }

    /**
     * @param $model
     * @return array
     */
    public function getRoute($model)
    {
        return $model->exists ? ['admin.banner.images.update', $model->id] : ['admin.banner.images.store'];
    }

    /**
     * @return array
     */
    public function getSubmitText()
    {
        return 'Save';
    }

    /**
     * @param $params
     * @return string
     */
    public function getImage($params)
    {
        return '<img src="' . \Asset::images()->getImage($params['media_id'], 'small') . '"  width = "100" />';
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

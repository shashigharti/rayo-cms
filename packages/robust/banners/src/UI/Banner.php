<?php
namespace Robust\Banners\UI;

use Robust\Core\UI\Traits\RouteTrait;
use Robust\Banners\Models\Banner as Model;

/**
 * Class Banner
 * @package Robust\Banners\UI
 */
class Banner
{
    use RouteTrait;

    /**
     * Banner constructor.
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
        'name' => 'Name',
        'slug' => 'Slug',
        'Images' => ['callback' => 'Images'],


        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-edit"></i> Edit',
                'url' => "admin.banners.edit",
                'permission' => 'banners.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon md-delete"></i> Delete',
                'url' => "admin.banners.destroy",
                'permission' => 'banners.delete'
            ]
        ]
    ];

    /**
     * @var array
     */
    public $left_menu = [
        'add' => ['display_name' => 'Add', 'url' => 'admin.banners.create', 'permission' => 'banners.add']
    ];

    /**
     * @var array
     */
    public $addrules = [
        'name' => 'required',
        'slug' => 'required| unique:banners',

    ];

    /**
     * @var array
     */
    public $editrules = [];

    /**
     * @param $category
     * @return string
     */
    public function getMethod($category)
    {
        return $category->exists ? 'PUT' : 'POST';
    }

    /**
     * @param $banner
     * @return array
     */
    public function getRoute($banner)
    {
        return $banner->exists ? ['admin.banners.update', $banner->id] : ['admin.banners.store'];
    }

    /**
     * @return array
     */
    public function getSubmitText()
    {
        return 'Save';
    }

    /**
     * @param $row
     * @return string
     */
    public function getImages($row)
    {
        $data = Model::find($row['id']);
        return '<a href="' . route('admin.banner.images.index', ['id' => $row['id']]) . '"> <span class="badge">' . count($data->images()->get()) . '</span></a><br>';
    }

    /**
     * @return array
     */
    public function getTabs($model)
    {
        return [
            'Banner' => ['url' => route('admin.banners.edit', [$model->id]), 'permission' => 'banners.manage'],
            'Images' => ['url' => route('admin.banner.images.get-images', [$model->id]), 'permission' => 'banners.add']
        ];
    }


}

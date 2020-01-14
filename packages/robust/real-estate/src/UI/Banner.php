<?php
namespace Robust\RealEstate\UI;

use Robust\Core\UI\Core\BaseUI;
use Robust\Core\UI\Traits\RouteTrait;
use Robust\RealEstate\Models\Banner as Model;

/**
 * Class Banner
 * @package Robust\RealEstate\UI
 */
class Banner extends BaseUI
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
        'title' => 'Title',
        'slug' => 'Slug',
        'template' => 'Template',
        'options' => [
            'edit' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">edit</i> ',
                'url' => "admin.banners.edit",
                'permission' => 'real-estate.banners.edit'
            ],
            'delete' => [
                'display_name' => '<i aria-hidden="true" class="site-menu-icon material-icons">delete</i> ',
                'url' => "admin.banners.destroy",
                'permission' => 'real-estate.banners.delete'
            ]
        ]
    ];

    /**
     * @var array
     */
    public $right_menu = [
        'add' => ['display_name' => 'Add', 'url' => 'admin.banners.create', 'permission' => 'real-estate.banners.add', 'icon' => 'add']
    ];

    /**
     * @var array
     */
    public $addrules = [
        'title' => 'required',
        'slug' => 'required| unique:real_estate_banners'
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

}

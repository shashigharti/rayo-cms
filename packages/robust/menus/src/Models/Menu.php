<?php
namespace Robust\Menus\Models;

use Robust\Core\Models\BaseModel;


class Menu extends BaseModel
{
    /**
     * @var boolean
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'website_menus';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Menus\Models\Menu';

    /**
     * @var string
     */
    protected $fillable = [
        'name',
        'items',
        'menu_limit',
        'type',
        'created_at',
        'updated_at',
    ];
}

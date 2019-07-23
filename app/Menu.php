<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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
        'type'
    ];
}

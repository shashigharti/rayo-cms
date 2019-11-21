<?php
namespace Robust\Banners\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 * @package Robust\Banners\Models
 */
class Banner extends Model
{
    /**
     * @var string
     */
    protected $table = 'banners';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $namespace = 'Robust\Banners\Models\Banner';

    /**
     * @var string
     */
    protected $fillable = [
        'name',
        'slug',
        'properties',
        'template',
        'order',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('\Robust\Banners\Models\Image', 'banner_id', 'id');
    }
}

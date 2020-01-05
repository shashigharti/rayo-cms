<?php
namespace Robust\RealEstate\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 * @package Robust\RealEstate\Models
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
    protected $namespace = 'Robust\RealEstate\Models\Banner';

    /**
     * @var string
     */
    protected $fillable = [
        'title',
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

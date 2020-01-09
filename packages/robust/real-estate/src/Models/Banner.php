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
     * Change the property attribute to json on save when array is being
     *
     * @param  string  $value
     * @return void
     */
    public function setPropertiesAttribute($value)
    {
        $this->attributes['properties'] = json_encode($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('\Robust\Banners\Models\Image', 'banner_id', 'id');
    }
}

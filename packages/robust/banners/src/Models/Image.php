<?php
namespace Robust\Banners\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var string
     */
    protected $table = 'banners_images';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $namespace = 'Robust\Banners\Models\Image';

    /**
     * @var string
     */
    protected $fillable = [
        'banner_id',
        'media_id',
        'description',
        'link',
        'target',
        'start_date',
        'end_date'
    ];

}

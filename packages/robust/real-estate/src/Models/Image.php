<?php
namespace Robust\Banners\Models;

use Illuminate\Database\Eloquent\Model;
use Robust\Core\Models\Media;

/**
 * Class RealEstate
 * @package Robust\RealEstate\Models
 */
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
    protected $namespace = 'Robust\RealEstate\Models\Image';

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function media()
    {
        return $this->hasOne(Media::class,'id','media_id');
    }
}

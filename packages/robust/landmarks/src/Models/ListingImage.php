<?php

namespace Robust\Landmarks\Model;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class ListingImage extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'listing_images';

    /**
     * @var array
     */
    protected $fillable = [
        'listing_id',
        'image_id',
        'listing_url',
        'type',
        'modified',
        'image_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo(Listings::class, 'uid', 'listing_id');
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return URL::to($this->listing_url);
    }

    /**
     * @return string
     */
    public function getFilepath()
    {
        return public_path() . $this->listing_url;
    }
}

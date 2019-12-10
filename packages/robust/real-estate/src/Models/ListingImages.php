<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class ListingImages extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_listing_images';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\ListingImages';
    /**
     * @var array
     */
    protected $fillable = [ 'listing_id', 'image_id', 'url', 'type', 'modified' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}

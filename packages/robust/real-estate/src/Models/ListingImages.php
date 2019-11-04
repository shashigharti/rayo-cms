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
    protected $table = 'listing_images';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\ListingImages';
    /**
     * @var array
     */
    protected $fillable = [ 'listing_id', 'image_id', 'listing_url', 'type', 'modified', 'image_id' ];
}

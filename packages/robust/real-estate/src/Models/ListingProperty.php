<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class ListingProperty
 * @package Robust\Mls\Models
 */
class ListingProperty extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_listing_properties';
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\ListingProperty';

    /**
     * @var array
     */
    protected $fillable = ['type','value','listing_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->BelongsTo(Listing::class, 'listing_id');
    }
}

<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class PriceRange
 * @package Robust\RealEstate\Models
 */
class PriceRange extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_price_ranges';

    /**
     * @var array
     */
    protected $fillable = [
        'priceRangeable_id',
        'priceRangeable_type',
        'price_range_name',
        'price_range',
    ];
}

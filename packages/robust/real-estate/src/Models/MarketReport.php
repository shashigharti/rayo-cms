<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class MarketReport extends BaseModel
{
    protected $table = 'market_reports';

    protected $fillable = [
        'model_id', 'slug', 'name', 'model_type', 'total_listings', 'total_listings_active',
        'total_listings_sold', 'total_listings_sold_past_year', 'total_listings_sold_this_year',
        'median_price_active', 'median_price_sold', 'median_price_sold_past_year', 'median_price_sold_this_year',
        'average_price_active', 'average_price_sold', 'average_price_sold_past_year', 'average_price_sold_this_year',
        'average_dos', 'average_dos_past_year', 'average_dos_this_year', 'median_dos',
    ];

}

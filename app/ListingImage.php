<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    protected $table = 'listing_images';

    protected $fillable = [
        'listing_id', 'image_id', 'listing_url', 'type', 'modified', 'image_id',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'uid', 'listing_id');
    }
}

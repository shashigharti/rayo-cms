<?php

namespace Robust\Pages\Models;

use Robust\Core\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Category
 * @package Robust\Pages\Models
 */
class Logo extends BaseModel implements HasMedia
{

    use HasMediaTrait;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
    ];

    /**
     * @var string
     */
    protected $table = 'logos';

    /**
     * @return string
     */
    public function path()
    {

        $media = $this->getMedia();

        if (isset($media[0])) {
            $path = $media[0]->getFullUrl();
        } else {
            $path = 'http://via.placeholder.com/50x50';
        }

        return $path;
    }
}

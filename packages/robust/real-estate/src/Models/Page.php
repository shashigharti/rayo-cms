<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class Page extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_pages';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var array
     */
    public $searchable = ['name', 'slug', 'content', 'name_ne', 'excerpt', 'content_ne'];
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\Page';

    /**
     * @var string
     */

    protected $fillable = [
        'title',
        'url',
        'slug',
        'content',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at'
    ];

}

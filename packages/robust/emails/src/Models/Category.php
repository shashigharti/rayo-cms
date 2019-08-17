<?php
namespace Robust\Pages\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class Category
 * @package Robust\Pages\Models
 */
class Category extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'pages_categories';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $namespace = 'Robust\Pages\Models\Category';

    /**
     * @var array
     */
    public $searchable = ['name', 'description'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'description_ne',
        'name_ne'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('Robust\Pages\Models\Page', 'category_id');
    }

}

<?php
namespace Robust\Pages\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class PageDownload
 * @package Robust\Pages\Models
 */
class PageDownload extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'pages_downloads';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $namespace = 'Robust\Pages\Models\PageDownload';

    /**
     * @var string
     */
    protected $fillable = [
        'page_id',
        'name',
        'file',
        'description'
    ];
}

<?php

namespace Robust\Emails\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreEmailTemplate
 * @package App
 */
class CoreEmailTemplate extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'core_email_templates';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'group',
        'template',
        'status',
        'subject',
        'frequency',
        'starts_at',
        'ends_at',
        'created_at',
        'updated_at'
    ];
}

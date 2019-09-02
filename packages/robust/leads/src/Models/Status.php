<?php
namespace Robust\Leads\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class Page
 * @package Robust\Pages\Models
 */
class Status extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'statuses';

    /**
     * @var boolean
     */
    public $timestamps = true;


    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

}

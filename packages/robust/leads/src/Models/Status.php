<?php
namespace Robust\Leads\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Status
 * @package Robust\Leads\Models
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

}

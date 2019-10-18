<?php

namespace Robust\Landmarks\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class Zip extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'zips';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
        'county_id',
        'slug',
        'frontpage',
        'active',
        'sold',
        'frontpage_order',
        'menu_order',
        'latitude',
        'longitude'
    ];


    /**
     * @param $query
     */
    public function scopeSatisfying($query)
    {
//        $params = Client::get()->getSatisfyingCount();
        $params = ['sold' => '1', 'active' => '1']; // Temp until Clients model is resolved
        $query->where(function ($query) use ($params) {
            $query->where('active', '>=', $params['active'])
                ->orWhere('sold', '>=', $params['sold']);
        });
    }

    /**
     * @return bool
     */
    public function isHiddenDropdown()
    {
        return $this->where($this->dropdown, '!=', 1);
    }

}

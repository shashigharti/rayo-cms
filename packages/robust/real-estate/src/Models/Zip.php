<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Zip
 * @package Robust\RealEstate\Models
 */
class Zip extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_zips';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
        'county_id',
        'dropdown',
        'slug',
        'active',
        'sold',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function county()
    {
        return $this->hasOne(County::class, 'id', 'county_id');
    }
}

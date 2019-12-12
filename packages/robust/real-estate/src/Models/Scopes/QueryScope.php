<?php
namespace Robust\RealEstate\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryScope implements Scope
{
    protected const LISTING_FIELDS = [
        'index' => [
            'real_estate_listings.id','real_estate_listings.uid','real_estate_listings.slug',
            'real_estate_listings.system_price','real_estate_listings.picture_count',
            'real_estate_listings.status','real_estate_listings.address_street','state',
            'real_estate_listings.baths_full','real_estate_listings.bedrooms'
        ]
    ];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $query_params = request()->all();
        $new_properties = [];
        $empty_values = ['', null];

        // Remove empty and null values
        foreach($query_params as $property => $values){            
            if(is_array($values) && count($values) >= 0 ){
                $new_properties[$property] = $values;
            }
            elseif(!in_array($values, $empty_values)){
                $new_properties[$property] = $values;
            }
        }       

        // Build where condition
        foreach($new_properties as $property => $values){
            if(is_array($values)){
                foreach($values as $value){
                    $builder = $builder->orWhere(function ($query) use ($property, $value){
                        $query->where('type', 'LIKE', $property)
                        ->where('value','LIKE',"%$value%");
                    });
                }                
            }else{
                $builder = $builder->where('type', 'LIKE', $property);
            }
        }

        return $builder;
    }
}
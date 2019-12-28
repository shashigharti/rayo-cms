@set('price_settings', config('rws.advance-search-filters.price') )
@set('price_min', $price_settings['min'] ?? 2500)
@set('price_max', $price_settings['max'] ?? 1000000)
@set('price_increase', $price_settings['increase'] ?? 2500)

<div class="mb-20">
    <div class="input-field col s6">
        <select name="price_min" class="ad-search-field" data-selected="{{$query_params['price_min'] ?? ''}}">
            <option value="" selected disabled>Min</option>
            @for($price = $price_min; $price <= $price_max; $price += $price_increase)
                <option value="{{$price}}">${{$price}}</option>
            @endfor
        </select>
        <label>Price(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="price_max" class="ad-search-field" data-selected="{{$query_params['price_max'] ?? ''}}">
            <option value="" selected disabled>Max</option>
            @for($price = $price_min; $price <= $price_max; $price += $price_increase)
                <option value="{{$price}}">${{$price}}</option>
            @endfor
        </select>
    </div>
</div>

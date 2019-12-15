@set('price_min',$search_settings['price_min'] ?? '25000')
@set('price_max',$search_settings['price_max'] ?? '1000000')
@set('price_increase',$search_settings['price_increase'] ?? '25000')
<div class="mb-20">
    <div class="input-field col s6">
        <select name="price_min">
            <option value="">Min</option>
            @for($price = $price_min; $price <= $price_max; $price += $price_increase)
                <option value="{{$price}}">${{$price}}</option>
            @endfor
        </select>
        <label>Price(min-max)</label>
    </div>
    <div class="input-field col s6">
        <select name="price_max">
            <option value="">Max</option>
            @for($price = $price_min; $price <= $price_max; $price += $price_increase)
                <option value="{{$price}}">${{$price}}</option>
            @endfor
        </select>
    </div>
</div>

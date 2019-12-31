@set('price_settings', config('rws.map.map-filters.price') )
@set('filters', config('rws.map.market-survey-tools.search-filters') )
<div id="market-survey__listings--content" class="row">
    <div class="search--bar">
        <input name="location" class="search-filter search-filter__location" 
            type="text" 
            placeholder="input your address to go local"
        >
        <button class="theme-btn" type="button">Reset Filter</button>
    </div>
    <div class="filter--bar">
        <div class="row">
            <div class="col s7">
                <label>Price</label>
                <select class="search-filter search-filter__price-min" 
                    name="price_min"
                >
                    <option value="" selected disabled>Min</option>
                    @for($price = $price_settings['min']; $price <= $price_settings['max']; $price += $price_settings['increase'])
                        <option value="{{$price}}">${{$price}}</option>
                    @endfor
                </select>                
                <span>to</span>
                <select class="search-filter search-filter__price-max" 
                    name="price_max"
                >
                    <option value="" selected disabled>Max</option>
                    @for($price = $price_settings['min']; $price <= $price_settings['max']; $price += $price_settings['increase'])
                        <option value="{{$price}}">${{$price}}</option>
                    @endfor
                </select>
            </div>
            @if(isset($filters['sold']))
                <div class="col s5">
                    <label>{{$filters['sold']['display']}}</label>
                    <select class="search-filter search-filter__status" name="status">
                        @foreach($filters['sold']['values'] as $value)
                            <option value="{{ $value['value'] }}">{{ $value['display'] }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>
    <div class="market-survey__listings--details">
        <div class="row">
            <label>Checkmark Properties to Compare</label>
        </div>
        <div class="row">
            <div id="market-survey__listings--details-block" class="market-survey__listings--details-block">
               
            </div>
        </div>
    </div>
</div>
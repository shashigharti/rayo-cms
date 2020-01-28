@set('price_settings', config('rws.map.map-filters.price') )
@set('filters', config('rws.map.market-survey-tools.search-filters') )
<div id="market-survey__listings--content" class="row">
    <div class="search--bar">
        <input name="address"
               id="autocomplete_address"
               data-url="{{route('api.market.survey.distance')}}"
               class="search-filter search-filter__location"
               type="text"
               placeholder="Input your address to go local!"
        >
        <button class="theme-btn" type="button">Reset Filter</button>
    </div>
    <div class="filter--bar">
        <div class="row">
            <div class="col s6">
                <label>Price</label>
                <select class="search-filter search-filter__price-min"
                        name="price_min"
                >
                    @for($price = $price_settings['min']; $price <= $price_settings['max']; $price += $price_settings['increment'])
                        <option value="{{ $price }}" {{ ($price == 25000) ? 'selected':'' }}> ${{ $price }} </option>
                    @endfor
                </select>
                <span>to</span>
                <select class="search-filter search-filter__price-max"
                        name="price_max"
                >
                    @for($price = $price_settings['min']; $price <= $price_settings['max']; $price += $price_settings['increment'])
                        <option value="{{ $price }}" {{ ($price == 100000) ? 'selected':'' }}> ${{ $price }} </option>
                    @endfor
                </select>
            </div>
            @if(isset($filters['sold_status']))
                <div class="col s6 sold-select-wrapper right-align">
                    <label>{{$filters['sold_status']['display']}}</label>
                    <select class="search-filter search-filter__status" name="sold_status">
                        @foreach($filters['sold_status']['values'] as $value)
                            <option
                                value="{{ $value['value'] }}" {{ ($value['value']  == 'sold_date-12_months') ? 'selected':'' }} >{{ $value['display'] }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>
    <div class="market-survey__listings--details">
        <div class="row">
            <div class="col s12">
                <label>Checkmark Properties to Compare</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="hide progress ajax__loading">
                    <div class="indeterminate"></div>
                </div>
                <div id="market-survey__listings--details-block" class="market-survey__listings--details-block" data-loading-elem=".ajax__loading">

                </div>
            </div>
        </div>
    </div>
</div>

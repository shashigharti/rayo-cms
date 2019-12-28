@set('price_settings', config('rws.map.map-filters.price') )
@set('filters', config('rws.map.market.search-filters') )
<div id="market-survey__listings--content" class="row">
    <div class="search--bar">
        <input name="location" class="search-filter search-filter__location" 
            type="text" 
            placeholder="input your address to go local"
        >
        <button class="theme-btn" type="button">Clear</button>
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
            @if(isset($filters['status']))
                <div class="col s5">
                    <label>Status</label>
                    <select class="search-filter search-filter__status" name="status">
                        <option>Active</option>
                        <option>Sold</option>
                    </select>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <button class="theme-btn market-survey__listings--reset-btn">Reset Filter</button>
    </div>
    <div class="market-survey__listings--details">
        <div class="row">
            <label>Checkmark Properties to Compare</label>
            <button class="theme-btn">Compare</button>
        </div>
        <div class="row">
            <div id="market-survey__listings--details-block" class="market-survey__listings--details-block">
                <div class="row">
                    <div class="col s6">
                        <div class="market-survey__listings--details-card">
                            <a href="#">
                                <img class="website/images/banner.jpg">
                                <div class="card-overlay">
                                    <input type="checkbox">
                                    <div class="card--details">
                                        <p>Sold $45k</p>
                                        <p>Dolphin HarbourPanama City Beach</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="market-survey__listings--details-card">
                            <a href="#">
                                <img class="website/images/banner.jpg">
                                <div class="card-overlay">
                                    <input type="checkbox">
                                    <div class="card--details">
                                        <p>Sold $45k</p>
                                        <p>Dolphin HarbourPanama City Beach</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="market-survey__listings--details-card">
                            <a href="#">
                                <img class="website/images/banner.jpg">
                                <div class="card-overlay">
                                    <input type="checkbox">
                                    <div class="card--details">
                                        <p>Sold $45k</p>
                                        <p>Dolphin HarbourPanama City Beach</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="market-survey__listings--details-card">
                            <a href="#">
                                <img class="website/images/banner.jpg">
                                <div class="card-overlay">
                                    <input type="checkbox">
                                    <div class="card--details">
                                        <p>Sold $45k</p>
                                        <p>Dolphin HarbourPanama City Beach</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="market-survey__listings--details-card">
                            <a href="#">
                                <img class="website/images/banner.jpg">
                                <div class="card-overlay">
                                    <input type="checkbox">
                                    <div class="card--details">
                                        <p>Sold $45k</p>
                                        <p>Dolphin HarbourPanama City Beach</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="market-survey__listings--details-card">
                            <a href="#">
                                <img class="website/images/banner.jpg">
                                <div class="card-overlay">
                                    <input type="checkbox">
                                    <div class="card--details">
                                        <p>Sold $45k</p>
                                        <p>Dolphin HarbourPanama City Beach</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
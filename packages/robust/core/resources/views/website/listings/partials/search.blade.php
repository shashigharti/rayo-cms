@set('sort_settings', config('rws.sorting'))
<div id="search-section">
    <div class="listing--search search-section">
        <div class="row">
            <div class="col s2 center-align">
                <p>FEATURES</p>
                <a href="#" class="theme-btn advance-search">Advanced search</a>
            </div>
            <div class="col s8">
                <div class="row">
                    <div class="row">
                        <div class="col s4 range-bar">
                            <p>PRICE</p>
                            <input class="price-range-slider jrange-slider" data-step="25000" data-format="$%s" data-min="25000" data-max="1000000" name="price" data-scale-min="25000" data-scale-max="1m+" type="hidden" value="{{ ($query_params['price_min'] ?? 0) . ',' . ($query_params['price_max'] ?? 1000000) }}" />
                        </div>
                        <div class="col s4 range-bar">
                            <p>BEDROOMS</p>
                            <input class="bedroom-range-slider jrange-slider" data-min="1" data-max="5" data-scale-min="1" data-scale-max="5+" name="beds" type="hidden" value="{{ ($query_params['beds_min'] ?? 1) . ',' . ( $query_params['beds_max'] ?? 5) }}" />
                        </div>
                        <div class="col s4 range-bar">
                            <p>BATHROOMS</p>
                            <input class="bathroom-range-slider jrange-slider" data-min="1" data-max="5" data-scale-min="1" data-scale-max="5+" name="bathrooms" type="hidden" value="{{ ($query_params['bathrooms_min'] ?? 1) . ',' . ( $query_params['bathrooms_max'] ?? 5) }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s2 center-align">
                <p>{{$results->total()}} ACTIVE LISTINGS</p>
                <button id="search-btn" class="theme-btn">Search</button>
            </div>
        </div>
    </div>
    <div class="listing--btn--block col s12">
        <div class="row">
            <div class="col m7 s12">
                <label>Sort By :</label>
                <select name="sort_by" class="search-section__select">
                    @foreach($sort_settings as $sort)
                        <option value="{{$sort['value']}}" {{ ( isset($query_params['sort_by']) && $query_params['sort_by'] == $sort['value'] ) ? 'selected':'' }}>{{$sort['display']}}</option>
                    @endforeach
                </select>
                <a href="{{route('website.realestate.sold-homes')}}" class="btn cyan">SOLD</a>
                <a href="{{route('website.realestate.homes-for-sale')}}" class="btn green">ACTIVE</a>
                @if($location)
                    @set('market_reports_settings', settings('real-estate', 'market_report'))
                    @set('location_type', get_location_type_by_class($location->locationable_type))

                    @if(isset($market_reports_settings['report_options']) && in_array($location_type, $market_reports_settings['report_options']))
                        <a class="waves-effect waves-light btn modal-trigger"
                           href="#researchToolModal">
                            Research Tools for {{ $location->name  }}
                        </a>
                        @include('core::website.partials.modal.research-tool')
                    @endif
                @endif

            </div>
            <div class="col m5 s12 right-align">
                <div class="total--records">
                    <span>{{$results->perPage()}}</span> of <span>{{$results->total()}}</span> Total Properties
                </div>
                <div class="listing--pagination">
                    <span><a href="{{$results->previousPageUrl()}}"><<</a></span>
                    <span class="active">{{$results->currentPage()}}</span>
                    <span><a href="{{$results->nextPageUrl()}}">>></a></span>
                </div>
            </div>
            <div class="col s12 listing--tags">
                <div class="search-section__tags">
                </div>
                <div class="search-section__tags-action">
                    <a href="#" class=" btn btn-sm theme-btn">CLEAR ALL</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="listing--advance_search">
    @include(Site::templateResolver('core::website.advance-search.index'))
</div>

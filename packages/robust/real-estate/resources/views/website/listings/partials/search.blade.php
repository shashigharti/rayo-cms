@set('sort_settings', config('rws.sorting'))
<form id="frm-search" method="get" action="{{$advancesearch_helper->getSearchURL()}}">
    <div class="listing--search  search-section">
        <div class="row">
            <div class="col s2 center-align">
                <p>FEATURES</p>
                <a href="#" class="theme-btn advance-search">Advanced search</a>
            </div>
            <div class="col s8">
                <div class="row">
                    <div class="col s4 range-bar">
                        <p>PRICE</p>
                        <input class="price-range-slider jrange-slider" data-step="25000" data-format="$%s" data-min="25000" data-max="1000000" name="price"  data-scale-min="25000"  data-scale-max="1m+" type="hidden" value="0,1000000" />
                    </div>
                    <div class="col s4 range-bar">
                        <p>BEDROOMS</p>
                        <input class="bedroom-range-slider jrange-slider" data-min="1" data-max="5" data-scale-min="1"  data-scale-max="5+" name="beds" type="hidden" value="1,5" />
                    </div>
                    <div class="col s4 range-bar">
                        <p>BATHROOMS</p>
                        <input class="bathroom-range-slider jrange-slider" data-min="1" data-max="5" data-scale-min="1"  data-scale-max="5+" name="bathrooms" type="hidden" value="1,5" />
                    </div>
                </div>
            </div>
            <div class="col s2 center-align">
                <p>{{$results->total()}} ACTIVE LISTINGS</p>
                <button type="submit" value="search" class="theme-btn">Search</button>
            </div>
        </div>
    </div>
    <div class="listing--btn--block col s12">
        <div class="row">
            <div class="col m7 s12">
                <label>Sort By :</label>
                <select name="sort">
                    @foreach($sort_settings as $sort)
                    <option value="{{$sort['value']}}">{{$sort['display']}}</option>
                    @endforeach
                </select>
                <a href="{{route('website.realestate.sold-homes')}}" class="btn cyan">SOLD</a>
                <a href="{{route('website.realestate.homes-for-sale')}}" class="btn green">ACTIVE</a>
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
                <span>Active</span>
                <span>Price : low to high</span>
                <a href="#" class=" btn btn-sm theme-btn">CLEAR ALL</a>
            </div>
        </div>
    </div>
    <div class="listing--advance_search">
        @include(Site::templateResolver('real-estate::website.advance-search.index'))
    </div>
</form>
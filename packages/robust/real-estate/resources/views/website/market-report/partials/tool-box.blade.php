<div class="market__tool-box row">
    <div id="market--left__sort" class="market--left__sort col m6 s12">
        <p><b>Sort By:</b></p>
        <div class="market--left__sort--btns">
            <a href="javascript:void(0)" data-type="Active" class="active" data-status="active">#Active Listings</a>
            <a href="javascript:void(0)" data-type="Average" data-status="inactive">Average Price Sold</a>
            <a href="javascript:void(0)" data-type="Median" data-status="inactive">Median Price Sold</a>
            <a href="javascript:void(0)" data-type="Sold" data-status="inactive">#Sold Listings</a>
            <a href="javascript:void(0)" data-type="Title" data-status="inactive">Alphabetically</a>
            <a href="javascript:void(0)" data-type="Priority" data-locations="" data-status="inactive">Priority Location</a>
        </div>
    </div>
    <div id="market--right__display" class="market--right__display col m6 s12">
        <div class="market--right__display--options">
            <p><b>Display :</b></p>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Average" data-status="active"></span>Average $</div>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Median" data-status="active"></span>Median $</div>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Active" data-status="active"></span>Active</div>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Sold" data-status="active"></span>Sold</div>
        </div>       
    </div>
    <div class="market__btns col s12 mt-40">
        <span class="btn--label">Checkmark areas to :</span>
        <div class="market__btns--container">
            @if($page_type != 'subdivisions')
                <a id="market__btns--subdivisions" class="btn-orange" href="" data-base-url="{{route('website.realestate.market.reports', 'subdivisions')}}">
                    Show Subdivisions
                </a>
            @endif

            <a id="market__btns--compare" data-base-url="{{route('website.realestate.market.reports', $page_type)}}" class="btn-green">
                Compare Selected Areas
            </a>
            <a href="#" class="btn-blue">
                Show On Map
            </a>
        </div>
        <div id="market__tags" class="tags">
        </div>
    </div>
</div>
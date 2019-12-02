<div class="market__tool-box row">
    <div id="market--left__sort" class="market--left__sort col s6">
        <p><b>Sort By:</b></p>
        <div class="market--left__sort--btns">
            <a href="#" data-type="Active" class="active" data-status="active">#Active Listings</a>
            <a href="#" data-type="Average" data-status="inactive">Average Price Sold</a>
            <a href="#" data-type="Median" data-status="inactive">Median Price Sold</a>
            <a href="#" data-type="Sold" data-status="inactive">#Sold Listings</a>
            <a href="#" data-type="Title" data-status="inactive">Alphabetically</a>
            <a href="#" data-type="Priority" data-locations="" data-status="inactive">Priority Location</a>
        </div>
    </div>
    <div id="market--right__display" class="market--right__display col s6">
        <div class="market--right__display--options">
            <p><b>Display :</b></p>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Average" data-status="active"></span>Average $</div>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Median" data-status="active"></span>Median $</div>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Active" data-status="active"></span>Active</div>
            <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Sold" data-status="active"></span>Sold</div>
        </div>
    </div>
    <div class="market__btns col s12 mt-40">
        <span class="btn--label">Checkmark areas to</span>
        <div class="market__btns--container">
            <a href="#" class="btn-orange">
                            Show Subdivisions
                        </a>
            <a id="market__btns--compare" href="" data-base-url="http://localhost:8000/market/reports/in/cities/" class="btn-green">
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
@set('market_report', settings('real-estate', 'market_report') != "" ? settings('real-estate', 'market_report') : [])
<div class="row">
    <div class="col s12">
        <div class="inner--title text-center">
            <h1>Market Reports</h1>
            <p>Serious about real Estate? Size up the market like a retalor using real MLS data! Research the properties that have recently sold</p>
            <p class="sub--inner">
                <b>Sellers-</b> this information can help you to list your home for the right price.&nbsp;
                <b>Buyers-</b> Find and Research neighborhoods in your price range. &nbsp;
                <b>Research by-</b> City , Zip Code , School District.
            </p>
            <div class="market--right__display--radio">
                <div class="block--container">
                    @foreach($market_report['tabs'] as $key => $option)
                      <span class="single--block right-align">
                        <label>
                          <input class="market-report__type" name="market-report__type"
                            value="{{ $key }}" type="radio"
                            data-href={{ route("website.realestate.market.reports", ['location_type' => $key]) }}
                            {{ ($page_type == $key) ? 'checked': ''}}
                          />
                          <span>{{ $option }}</span>
                        </label>
                      </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.listings.partials..header'))
@endsection
@section('body_section')
    <section class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    <div class="inner--title text-center">
                        <h1>Market Reports</h1>
                        <p>Serious about real state? Size up the market like a retalor using up to date MLS data!</p>
                        <p class="sub--inner">
                            <b>Sellers-</b>
                            Research your neighborhood to list your home for the right price.&nbsp;
                            <b>Buyers-</b>
                            Research all neighborhoods in your price range
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="market--left__sort" class="market--left__sort col s6">
                    <p><b>Sort By:</b></p>
                    <div class="market--left__sort--btns">
                        <a href="#" data-type="Average" class="active" data-status="active">Average Price Sold</a>
                        <a href="#" data-type="Median" data-status="inactive">Median Price Sold</a>
                        <a href="#" data-type="Active" data-status="inactive">#Active Listings</a>
                        <a href="#" data-type="Sold" data-status="inactive">#Sold Listings</a>
                        <a href="#" data-type="Title" data-status="inactive">Alphabetically</a>
                        <a href="#" data-type="Priority" data-locations="" data-status="inactive">Priority Location</a>
                    </div>
                </div>
                <div id="market--right__display" class="market--right__display col s6">
                    <div class="market--right__display--options">
                        <p><b>Display :</b></p>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox active" data-type="Average" data-status="active"></span>Average $</div>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="Median" data-status="active"></span>Median $</div>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="Active" data-status="active"></span>Active</div>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="Sold" data-status="active"></span>Sold</div>
                    </div>
                </div>
                <div class="market--right__search col s12 mt-40">
                    <span class="btn--label">Checkmark areas to</span>
                    <div class="market--compare--btns">
                        <a href="#" class="btn-orange">
                            Show Subdivisions
                        </a>
                        <a href="#" class="btn-green">
                            Compare Selected Areas
                        </a>
                        <a href="#" class="btn-blue">
                            Show On Map
                        </a>
                    </div>
                    <div class="tags">
                        <span>Hawaii <i class="fa fa-times" aria-hidden="true"></i></span>
                        <span>Active<i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div id="market__search--lists" class="market__search--lists">
                        @foreach($records as $report)
                            <div class="single--list__block">
                                <p class="single--list__block-item" data-type="Title" data-value="{{$report->reportable->name}}">
                                    <input type="checkbox"><label>{{$report->reportable->name}}</label>
                                </p>
                                <p class="single--list__block-item" data-type="Active" data-value="{{$report->total_listings_active}}"><span>
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>Active : {{$report->total_listings_active}}</span>
                                </p>
                                <p class="single--list__block-item" data-type="Sold" data-value="{{$report->total_listings_sold}}"><span>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : {{$report->total_listings_sold}}</span>
                                </p>
                                <p class="single--list__block-item" data-type="Average" data-value="{{$report->average_price_sold}}">
                                    <span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>${{$report->average_price_sold}}
                                </p>
                                <p class="single--list__block-item" data-type="Median" data-value="{{$report->median_price_sold}}">
                                    <span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>${{$report->median_price_sold}}
                                </p>
                            </div>
                        @endforeach  
                        {{-- remove it once the real data is entered --}}                      
                        <div class="single--list__block">
                            <p class="single--list__block-item" data-type="Title" data-value="Panama City Beach"><input type="checkbox"><label>Panama City Beach</label></p>
                            <p class="single--list__block-item" data-type="Active" data-value="50"><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : 50</span></p>
                            <p class="single--list__block-item" data-type="Sold" data-value="590"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : 590</span></p>
                            <p class="single--list__block-item" data-type="Average" data-value="9876567"><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$5876,567</p>
                            <p class="single--list__block-item" data-type="Median" data-value="7876567"><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$576,567</p>
                        </div>
                        <div class="single--list__block">
                            <p class="single--list__block-item" data-type="Title" data-value="Chipley"><input type="checkbox"><label>Chipley</label></p>
                            <p class="single--list__block-item" data-type="Active" data-value="60"><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : 60</span></p>
                            <p class="single--list__block-item" data-type="Sold" data-value="190"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : 690</span></p>
                            <p class="single--list__block-item" data-type="Average" data-value="8876567"><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$6876,567</p>
                            <p class="single--list__block-item" data-type="Median" data-value="8876567"><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$6876,567</p>
                        </div>
                        {{-- remove it once the data is entered --}} 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection


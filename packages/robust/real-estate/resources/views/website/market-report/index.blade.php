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
                <div id="market--left__sort" class="market--left__sort market--left__search col s6">
                    <p><b>Sort By:</b></p>
                    <div class="market--left__sort--btns sort__listings--btns">
                        <a href="#" data-type="average" data-status="active">Average Price Sold</a>
                        <a href="#" data-type="median" data-status="active">Median Price Sold</a>
                        <a href="#" data-type="active" data-status="active">#Active Listings</a>
                        <a href="#" data-type="sold" data-status="active">#Sold Listings</a>
                        <a href="#" data-type="alphabetically" data-status="active">Alphabetically</a>
                        <a href="#" data-type="priority" data-status="active">Priority Location</a>
                    </div>
                </div>
                <div id="market--right__display" class="market--right__display market--left__search col s6">
                    <div class="market--right__display--options sort__display">
                        <p><b>Display :</b></p>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="average" data-status="active"></span>Average $</div>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="median" data-status="active"></span>Median $</div>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="active" data-status="active"></span>Active</div>
                        <div class="market--right__display-content"><span class=" btn-default show-average-data-btn btn-checkbox" data-type="sold" data-status="active"></span>Sold</div>
                    </div>
                </div>
                <div class="market--right__search col s12 mt-40">
                    <span class="btn--label">Checkmark areas to</span>
                    <div class="market--compare--btns">
                        <a href="#" class="btn-simple">
                            Compare Selections
                        </a>
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
                        <div class="single--list__block">
                            <p class="single--list__block-item" data-type="title" data-value="Hawaii"><input type="checkbox"><label>Hawaii</label></p>
                            <p class="single--list__block-item" data-type="Active" data-value="40"><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : 40</span></p>
                            <p class="single--list__block-item" data-type="Sold" data-value="390"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : 390</span></p>
                            <p class="single--list__block-item" data-type="Average" data-value="9876,567"><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p class="single--list__block-item" data-type="Median" data-value="9876,567"><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p class="single--list__block-item" data-type="title" data-value="Hawaii"><input type="checkbox"><label>Hawaii</label></p>
                            <p class="single--list__block-item" data-type="Active" data-value="40"><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : 50</span></p>
                            <p class="single--list__block-item" data-type="Sold" data-value="390"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : 590</span></p>
                            <p class="single--list__block-item" data-type="Average" data-value="9876,567"><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$5876,567</p>
                            <p class="single--list__block-item" data-type="Median" data-value="9876,567"><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$576,567</p>
                        </div>
                        <div class="single--list__block">
                            <p class="single--list__block-item" data-type="title" data-value="Hawaii"><input type="checkbox"><label>Hawaii</label></p>
                            <p class="single--list__block-item" data-type="Active" data-value="40"><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : 60</span></p>
                            <p class="single--list__block-item" data-type="Sold" data-value="390"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : 690</span></p>
                            <p class="single--list__block-item" data-type="Average" data-value="9876,567"><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$6876,567</p>
                            <p class="single--list__block-item" data-type="Median" data-value="9876,567"><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$6876,567</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection


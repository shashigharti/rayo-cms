@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.listings.partials.header'))
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
                <div class="col s6">
                    <p><b>Sort By:</b><select><option>Cities</option></select></p>
                    <div class="market--report__btns">
                        <a href="#" class="active">Average Sale Price</a>
                        <a href="#">Median Sale Price</a>
                        <a href="#">Average Price Sold</a>
                        <a href="#">Median Price Sold</a>
                        <a href="#">Homes for Sale</a>
                        <a href="#">Homes Sold</a>
                    </div>
                </div>
                <div class="col s6">
                    <div class="market--report__checkboxes">
                        <p><b>Display :</b></p>
                        <div><span class=" btn-default show-average-data-btn btn-checkbox active" data-add="average"></span>Show Average $</div>
                        <div><span class=" btn-default show-average-data-btn btn-checkbox" data-add="average"></span>Show Median $</div>
                        <div><span class=" btn-default show-average-data-btn btn-checkbox" data-add="average"></span>Show Active #</div>
                        <div><span class=" btn-default show-average-data-btn btn-checkbox" data-add="average"></span>Show Sold #</div>
                        <div><span class=" btn-default show-average-data-btn btn-checkbox" data-add="average"></span>Only Areas with Activity</div>
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
                    <div class="market__search--lists">
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block-item">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
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


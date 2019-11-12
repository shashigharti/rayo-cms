@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','App\Helpers\BannerHelper')
@section('content')
    <section class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    <div class="inner--title text-center">
                        <h1>Market Reports</h1>
                        <p>Serious about real state? Size up the market like a retalor using up to date MLS data!</p>
                    </div>
                </div>
            </div>
            <div class="row page--info">
                <div class="col s12">
                    <h2>Listed cities</h2>
                </div>
                <div class="col s6">
                    <p><b>Sellers -</b>Research your neighbourhood to list your home for the right price</p>
                    <p>Checkmark areas to - <a href="#" class="green-line">See them on a map</a> or <a href="#" class="purple-line">Compare Selelcted Areas</a> . <a href="#" class="orange-line">More info</a></p>
                </div>
                <div class="col s6 text-right">
                    <p><b>Buyers -</b>Research all neighbourhoods in your price range</p>
                </div>
            </div>
            <div class="row">
                <div class="market--left__search col s4">
                    <p><b>Sort By:</b><select><option>Cities</option></select></p>
                    <div class="sort__listings--btns">
                        <a href="#">Average Sale Price</a>
                        <a href="#">Median Sale Price</a>
                        <a href="#">Average Price Sold</a>
                        <a href="#">Median Price Sold</a>
                        <a href="#">Homes for Sale</a>
                        <a href="#">Homes Sold</a>
                    </div>
                    <div class="sort__display">
                        <p><b>Display :</b></p>
                        <div><input type="checkbox">Average $</div>
                        <div><input type="checkbox">Median $</div>
                        <div><input type="checkbox">Homes Sold</div>
                        <div><input type="checkbox">Average $ Sold</div>
                        <div><input type="checkbox">Median $ Sold</div>
                    </div>
                </div>
                <div class="market--right__search col s8">
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
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
                            <p><input type="checkbox"><label>Hawaii</label></p>
                            <p><span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : </span>40</p>
                            <p><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : </span>390</p>
                            <p><span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>$9876,567</p>
                            <p><span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>$9876,567</p>
                        </div>
                        <div class="single--list__block">
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


<header>
    <div class="banner">
        <div class="slider">
           @include(Site::templateResolver('core::website.banners.partials.main-banner'))
            <div>
                <div class="banner-overlay">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="site-menu">
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <a href="#"><img src="assets/website/images/Logo.jpg" alt="logo"></a>
                                    <a href="#" data-target="mobile-demo" class="mobile-menu-btn"><i class="fa fa-bars"></i></a>
                                    <ul id="mobile-demo" class="dropdown-content">
                                        <li><a class="nav-link" href="#">Home</a></li>
                                        <li><a class="nav-link" href="#">Areas</a></li>
                                        <li><a class="nav-link" href="{{route('website.listings.active')}}">Homes For Sale</a></li>
                                        <li><a class="nav-link" href="{{route('website.listings.sold')}}">Sold Homes</a></li>
                                        <li><a class="nav-link" href="#">Market Stats</a></li>
                                        <li><a class="nav-link" href="#">Login</a></li>
                                        <li><a class="nav-link" href="#">Register</a></li>
                                    </ul>
                                    <ul class="right hide-on-med-and-down">
                                        <li><a class="nav-link" href="#">Home</a></li>
                                        <li><a class="nav-link" href="#">Areas</a></li>
                                        <li><a class="nav-link" href="#">Homes For Sale</a></li>
                                        <li><a class="nav-link" href="#">Sold Homes</a></li>
                                        <li><a class="nav-link" href="#">Market Stats</a></li>
                                        <li class="nav-btn"><a class="nav-link" href="#">Login</a></li>
                                        <li class="nav-btn"><a class="nav-link" href="#">Register</a></li>
                                    </ul>
                                </nav>
                            </div>
                           <div class="banner-caption">
                                <h1>Find Your Dream House With Us</h1>
                                <div class="search-section">
                                    <div class="row">
                                        <div class="col s3">
                                            <p>Location</p>
                                            <input type="text" placeholder="Type a city,zip,address or MLS#">
                                        </div>

                                        <div class="col s5">
                                            <div class="row">
                                                <div class="col s4 range-bar">
                                                    <p>PRICE</p>
                                                    <input class="price-range-slider" type="hidden" value="25,75"/>
                                                </div>
                                                <div class="col s4 range-bar">
                                                    <p>BEDROOMS</p>
                                                    <input class="bedroom-range-slider" type="hidden" value="25,75"/>
                                                </div>
                                                <div class="col s4 range-bar">
                                                    <p>BATHROOMS</p>
                                                    <input class="bathroom-range-slider" type="hidden" value="25,75"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s2 center-align">
                                            <p>FEATURES</p>
                                            <a href="#" class="theme-btn advance-search" >Advanced search</a>
                                        </div>
                                        <div class="col s2 center-align">
                                            <p>19723 ACTIVE LIstings</p>
                                            <a href="#" class="theme-btn">search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <advance-search  id="adv-search-dropdown"></advance-search>
</header>
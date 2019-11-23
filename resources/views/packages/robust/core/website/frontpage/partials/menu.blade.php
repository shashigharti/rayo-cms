 <nav class="navbar navbar-expand-lg navbar-light">
    <a href="#"><img src="assets/website/images/Logo.jpg" alt="logo"></a>
    <a href="#" data-target="mobile-demo" class="mobile-menu-btn"><i class="fa fa-bars"></i></a>
    <ul id="mobile-demo" class="dropdown-content">
        <li><a class="nav-link" href="#">Home</a></li>
        <li><a class="nav-link" href="#">Areas</a></li>
        <li><a class="nav-link" href="{{route('website.listings.active')}}">Homes For Sale</a></li>
        <li><a class="nav-link" href="{{route('website.listings.sold')}}">Sold Homes</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.market.reports', ['type' => 'cities'])}}">Market Stats</a></li>
        <li><a class="nav-link" href="#">Login</a></li>
        <li><a class="nav-link" href="#">Register</a></li>
    </ul>
    <ul class="right hide-on-med-and-down">
        <li><a class="nav-link" href="#">Home</a></li>
        <li><a class="nav-link" href="#">Areas</a></li>
        <li><a class="nav-link" href="#">Homes For Sale</a></li>
        <li><a class="nav-link" href="#">Sold Homes</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.market.reports', ['type' => 'cities'])}}">Market Stats</a></li>
        <li class="nav-btn"><a class="nav-link" href="#">Login</a></li>
        <li class="nav-btn"><a class="nav-link" href="#">Register</a></li>
    </ul>
</nav>
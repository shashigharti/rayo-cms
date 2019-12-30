<nav class="navbar navbar-expand-lg navbar-light">
    <ul class="right hide-on-med-and-down">
        <li><a class="nav-link" href="{{route('website.home')}}">Home</a></li>
        <li class="nav-item mega--dropdown">
            <a id="mega-dropdown" class="nav-link mega--dropdown__parent" href="#">Areas <i class="material-icons">arrow_drop_down</i></a>
                <div id="mega-dropdown_content" class="mega--dropdown__child hidden">
                    <span id="mega-dropdown_close" class="close--filters--dropdown right">
                        <i class="material-icons">clear</i>
                    </span>
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab"><a class="active" href="#cities">CITIES ({{$locations['cities'] ? count($locations['cities']): '0'}})</a></li>
                                <li class="tab"><a href="#counties">COUNTIES ({{$locations['counties'] ? count($locations['counties']): '0'}})</a></li>
                                <li class="tab"><a href="#zipcodes">ZIP CODES ({{$locations['zips'] ? count($locations['zips']): '0'}})</a></li>
                                <span><input type="radio" name="status_filter" value='active' checked>Homes for Sale</span>
                                <span><input type="radio" name="status_filter" value='sold'>Sold Homes</span>
                                <span><input type="radio" name="status_filter" value='all'>All</span>
                            </ul>
                        </div>
                        <div id="cities" class="tab-filter tab--content col s12">
                            <ul>
                                @if(isset($locations['cities']))
                                    @foreach($locations['cities'] as $location)
                                        <li data-active ="{{ $location->active_count }}"
                                            data-active-url="homes-for-sale"
                                            data-sold-url="sold-homes"
                                            data-sold="{{ $location->sold_count }}"
                                            data-all="{{ $location->sold_count + $location->active_count }}">
                                            <a class="tab__location" href="{{route('website.realestate.homes-for-sale',[
                                                    'location_type' => 'cities',
                                                    'location' => $location->slug
                                                    ])}}">
                                                {{ $location->name }}
                                                <span class="tab__location-count">({{ $location->active ?? $location->active_count }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div id="counties" class="tab-filter tab--content col s12">
                            <ul>
                                @if(isset($locations['counties']))
                                    @foreach($locations['counties'] as $location)
                                        <li data-active="{{ $location->active_count }}"
                                            data-sold="{{ $location->sold_count }}"
                                            data-all="{{ $location->sold_count + $location->active_count }}">
                                            <a class="tab__location" href="{{route('website.realestate.homes-for-sale',[
                                                    'location_type' => 'counties',
                                                    'location' => $location->slug
                                                    ])}}">
                                                {{ $location->name }} ({{ $location->active ?? $location->active_count }})
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div id="zipcodes" class="tab-filter tab--content col s12">
                            <ul>
                                @if(isset($locations['zips']))
                                    @foreach($locations['zips'] as $location)
                                        <li data-active="{{ $location->active_count }}"
                                            data-sold="{{ $location->sold_count }}"
                                            data-all="{{ $location->sold_count + $location->active_count }}">
                                            <a class="tab__location" href="{{route('website.realestate.homes-for-sale',[
                                                    'location_type' => 'zips',
                                                    'location' => $location->slug
                                                    ])}}">
                                                {{ $location->name }} ({{ $location->active ?? $location->active_count }})
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
        </li>
        <li><a class="nav-link" href="{{route('website.realestate.homes-for-sale')}}">Homes For Sale</a></li>
        <li><a class="nav-link" href="{{route('website.realestate.sold-homes')}}">Sold Homes</a></li>
        <li><a class="nav-link" href="{{route('market.reports', ['type' => 'cities'])}}">Market Stats</a></li>
        <li class="nav-btn">
            @if(Auth::check())
                <a class="nav-link waves-effect waves-light modal-trigger" href="{{route('website.realestate.profile.index')}}">My Review</a>
            @else
                <a class="nav-link waves-effect waves-light modal-trigger" href="#modal__login">Login</a>
            @endif
            @include(Site::templateResolver('real-estate::website.auth.login'))
        </li>
        <li class="nav-btn">
            @if(Auth::check())
                <a class="nav-link waves-effect waves-light modal-trigger" href="{{route('website.realestate.leads.logout')}}">Logout</a>
            @else
                <a class="nav-link waves-effect waves-light modal-trigger" href="#modal__register">Register</a>
            @endif
            @include(Site::templateResolver('real-estate::website.auth.register'))
        </li>
    </ul>
    <a href="#"><img src="{{asset('assets/website/images/Logo.jpg')}}" alt="logo"></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>


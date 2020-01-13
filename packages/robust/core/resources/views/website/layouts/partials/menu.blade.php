@set('menus', settings('real-estate', 'menus') != ""? settings('real-estate', 'menus') : [])
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
                            @foreach($menus as $menu)
                                <li class="tab"><a class="active" href="#{{$menu}}">{{ucwords($menu)}}
                                        ({{$locations[$menu] ? count($locations[$menu]): '0'}})</a>
                                </li>
                            @endforeach
                            <span><input type="radio" name="status_filter" value='active' checked>Homes for Sale</span>
                            <span><input type="radio" name="status_filter" value='sold'>Sold Homes</span>
                            <span><input type="radio" name="status_filter" value='all'>All</span>
                        </ul>
                    </div>
                    @foreach($menus as $menu)
                        <div id="{{ $menu }}" class="tab-filter tab--content col s12">
                            <ul>
                                @if(isset($locations[$menu]))
                                    @foreach($locations[$menu] as $location)
                                        <li data-active="{{ $location->active_count }}"
                                            data-active-url="{{ settings('real-estate', 'url_active') }}"
                                            data-sold-url="{{ settings('real-estate', 'url_sold') }}"
                                            data-all-url="{{ settings('real-estate', 'url_active') }}"
                                            data-sold="{{ $location->sold_count }}"
                                            data-all="{{ $location->sold_count + $location->active_count }}">
                                            <a class="tab__location" href="{{route('website.realestate.homes-for-sale',[
                                                    'location_type' => $menu,
                                                    'location' => $location->slug
                                                    ])}}"
                                            >
                                                {{ $location->name }}
                                                <span class="tab__location-count">({{ $location->active ?? $location->active_count }}
                                                    )</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="parent-menu">
            <a class="nav-link" href="{{ settings('real-estate', 'url_active') }}">
                Homes For Sale
                <i class="material-icons">arrow_drop_down</i>
                @set('menus', $banner_helper->getBannersBySlug('home-for-sale'))
                @if($menus)
                    @set('properties', json_decode($menus->properties))
                    @set('titles', $properties->titles)
                    @set('urls', $properties->urls)
                    <div class="child-menu">
                        @foreach($titles as $key => $title)
                            <a class="dropdown-item" href="{{ $urls[$key] }}">{{ $title }}</a>
                        @endforeach
                    </div>
                @endif
            </a>
        </li>
        <li class="parent-menu">
            <a class="nav-link" href="{{ settings('real-estate', 'url_sold') }}">
                Sold Homes
                @set('menus', $banner_helper->getBannersBySlug('sold-homes'))
                @if($menus)
                    @set('properties', json_decode($menus->properties))
                    @set('titles', $properties->titles)
                    @set('urls', $properties->urls)
                    <div class="child-menu">
                        @foreach($titles as $key => $title)
                            <a class="dropdown-item" href="{{ $urls[$key] }}">{{ $title }}</a>
                        @endforeach
                    </div>
                @endif
            </a>
        </li>
        <li><a class="nav-link" href="{{route('website.realestate.market.reports', ['type' => 'cities'])}}">Market
                Stats</a></li>
        <li class="nav-btn">
            @if(Auth::check())
                <a class="nav-link waves-effect waves-light modal-trigger" href="{{route('website.user.profile')}}">My
                    Review</a>
            @else
                <a class="nav-link waves-effect waves-light modal-trigger" href="#modal__login">Login</a>
            @endif
            @include(Site::templateResolver('admin::website.auth.login'))
        </li>
        <li class="nav-btn">
            @if(Auth::check())
                <a class="nav-link waves-effect waves-light modal-trigger" href="{{route('website.auth.logout')}}">Logout</a>
            @else
                <a class="nav-link waves-effect waves-light modal-trigger" href="#modal__register">Register</a>
            @endif
            @include(Site::templateResolver('admin::website.auth.register'))
        </li>
    </ul>
    <a href="#"><img src="{{asset('assets/website/images/Logo.jpg')}}" alt="logo"></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>


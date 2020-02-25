@set('menus', settings('general-setting', 'menus') != "" ? settings('general-setting', 'menus') : [])

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
                                <li class="tab">
                                    <a class="active" href="#{{$menu}}">{{ucwords($menu)}}
                                        ({{ $locations[$menu] ? count($locations[$menu]): '0'}})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @foreach($menus as $menu)
                        <div id="{{ $menu }}" class="tab-filter tab--content col s12">
                            <ul>
                                <li>Parent Menu</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="parent-menu">
            <a class="nav-link" href="#">
                Homes For Sale
                <i class="material-icons">arrow_drop_down</i>
                @set('menus', $banner_helper->getBannersBySlug('homes-for-sale'))
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
            <a class="nav-link" href="#">
                Sold Homes
                <i class="material-icons">arrow_drop_down</i>
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
        <li>
            <a class="nav-link" href="">Services
            </a>
        </li>
        <li class="nav-btn">
            @if(Auth::check())
                <a class="nav-link waves-effect waves-light modal-trigger" href="{{route('website.user.profile')}}">My
                    Review
                </a>
            @else
                <a class="nav-link waves-effect waves-light modal-trigger" href="#modal__login">Login</a>
            @endif
            @include(Site::templateResolver('core::website.auth.login'))
        </li>
        <li class="nav-btn">
            @if(Auth::check())
                <a class="nav-link waves-effect waves-light modal-trigger" href="{{route('website.auth.logout')}}">Logout</a>
            @else
                <a class="nav-link waves-effect waves-light modal-trigger" href="#modal__register">Register</a>
            @endif
            @include(Site::templateResolver('core::website.auth.register'))
        </li>
    </ul>
    <a href="#"><img src="{{asset('assets/website/images/Logo.jpg')}}" alt="logo"></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    @include(Site::templateResolver('core::website.layouts.partials.mobile-menu'))
</nav>

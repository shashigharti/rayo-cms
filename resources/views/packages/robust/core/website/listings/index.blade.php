@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    <div class="banner">
        <div class="slider">
            @include(Site::templateResolver('core::website.banners.partials.main-banner'))
            <div class="banner-overlay">
                <div class="container-fluid">
                    <div class="row">
                        <div class="site-menu">
                            @include(Site::templateResolver('core::website.frontpage.partials.menu'))
                        </div>
                    </div>
                    <div class="site-menu">
                        @include(Site::templateResolver('core::website.frontpage.partials.search'))
                    </div>
                </div>
            </div>
        </div>
    </div>
    <advance-search id="adv-search-dropdown"></advance-search>
@endsection

@section('body_section')
    @include(Site::templateResolver('core::website.listings.partials.main'))
    @include(Site::templateResolver('core::website.listings.partials.footer'))
@endsection

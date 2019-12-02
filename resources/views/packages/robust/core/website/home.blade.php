@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@inject('frontpage_helper','Robust\RealEstate\Helpers\FrontPageHelper')
@inject('setting_helper','Robust\RealEstate\Helpers\CoreSettingHelper')
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
    @include(Site::templateResolver('core::website.advance-search.index'))
@endsection
@section('body_section')
    {{-- @include(Site::templateResolver('core::website.frontpage.single-col-properties')) --}}
    @include(Site::templateResolver('core::website.frontpage.partials.ad-banners'))
    {{-- @include(Site::templateResolver('core::website.frontpage.cta')) --}}
@endsection

@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection

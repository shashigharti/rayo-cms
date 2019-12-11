@extends(Site::templateResolver('real-estate::website.layouts.default'))

@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@inject('listing_helper','Robust\RealEstate\Helpers\ListingHelper')
@inject('setting_helper','Robust\Core\Helpers\SettingsHelper')
@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@section('header')
    <div class="banner">
        <div class="slider">
            @include(Site::templateResolver('banners::website.main-banner'))
            <div class="banner-overlay">
                <div class="container-fluid">
                    <div class="row">
                        <div class="site-menu">
                            @include(Site::templateResolver('real-estate::website.frontpage.partials.menu'))
                        </div>
                    </div>
                    @include(Site::templateResolver('real-estate::website.frontpage.partials.search'))
                </div>
            </div>
        </div>
    </div>
    @include(Site::templateResolver('real-estate::website.advance-search.index'))
@endsection
@section('body_section')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.ad-banners'))
@endsection

@section('footer')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.footer'))
@endsection

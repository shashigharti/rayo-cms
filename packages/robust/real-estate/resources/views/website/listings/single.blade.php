@extends(Site::templateResolver('real-estate::website.layouts.default'))
@inject('setting_helper','Robust\Core\Helpers\SettingsHelper')
@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@set('details',$setting_helper->getValuesBySlug('listing-details'))
@section('header')
    <header class="sub-header">
        <div class="container-fluid">
            <div class="site-menu">
                @include(Site::templateResolver('real-estate::website.frontpage.partials.menu'))
                @include(Site::templateResolver('real-estate::website.frontpage.partials.mobile-menu'))
            </div>
        </div>
    </header>
@endsection

@section('body_section')
    @include(Site::templateResolver('real-estate::website.listings.partials.details'))
@endsection

@section('footer')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.footer'))
@endsection


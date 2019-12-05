@extends(Site::templateResolver('core::website.layouts.default'))
@inject('setting_helper','Robust\RealEstate\Helpers\CoreSettingHelper')
@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@set('details',$setting_helper->getSettingByType('listing-details'))
@section('header')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.header'))
@endsection

@section('body_section')
    @include(Site::templateResolver('real-estate::website.listings.partials.details'))
@endsection

@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection


@extends(Site::templateResolver('core::website.layouts.default'))
@inject('setting_helper','Robust\Core\Helpers\SettingsHelper')
@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@set('details', settings('data-mapping'))
@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection

@section('body_section')
    @include(Site::templateResolver('core::website.listings.partials.details'))
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection


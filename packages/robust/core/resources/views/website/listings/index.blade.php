@extends(Site::templateResolver('core::website.layouts.default'))
@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@inject('setting_helper','Robust\Core\Helpers\SettingsHelper')
@inject('report_helper','Robust\RealEstate\Helpers\MarketReportHelper')
@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection

@section('body_section')
    @include(Site::templateResolver('core::website.listings.partials.main'))
@endsection

@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection

@extends(Site::templateResolver('core::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@inject('marketreport_helper','Robust\RealEstate\Helpers\MarketReportHelper')

@set('locations', $location_helper->getLocations(['cities','counties','zips']))
@set('settings', config('rws.market-report'))
@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection
@section('body_section')    
    <section class="market market-report main-content" data-page='{{$page_type}}'>
        <div class="container-fluid">
            @include(Site::templateResolver('core::website.market-report.partials.info'))
            @if($sub_location_type != '')
                <div class="row">
                    <div class="col s12">
                        <h5> {{ $title }} Subdivisions </h5>
                    </div>
                </div>
            @endif
            @include(Site::templateResolver('core::website.market-report.partials.tool-box'))
            @include(Site::templateResolver('core::website.market-report.partials.locations'))  
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection


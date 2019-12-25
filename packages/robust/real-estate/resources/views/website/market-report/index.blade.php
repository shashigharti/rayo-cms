@extends(Site::templateResolver('real-estate::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@inject('marketreport_helper','Robust\RealEstate\Helpers\MarketReportHelper')

@set('locations', $location_helper->getLocations(['cities','counties','zips']))
@set('settings', config('rws.market-report'))
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
    <section class="market main-content" data-page='{{$page_type}}'>
        <div class="container-fluid">
            @include(Site::templateResolver('real-estate::website.market-report.partials.info'))
            @if($sub_location_type != '')
                <div class="row">
                    <div class="col s12">
                        <h5> {{ $title }} Subdivisions </h5>
                    </div>
                </div>
            @endif
            @include(Site::templateResolver('real-estate::website.market-report.partials.tool-box'))
            @include(Site::templateResolver('real-estate::website.market-report.partials.locations'))  
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.footer'))
@endsection


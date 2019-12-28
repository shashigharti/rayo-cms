@extends(Site::templateResolver('real-estate::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@inject('marketreport_helper','Robust\RealEstate\Helpers\MarketReportHelper')

@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@set('settings', config('rws.market-report'))

@section('header')
    <header class="sub-header">
        <div class="container-fluid">
            <div class="site-menu">
                @include(Site::templateResolver('real-estate::website.frontpage.partials.menu'))
            </div>
        </div>
    </header>
@endsection
@section('body_section')
    <section class="market compare-locations main-content" data-page='{{$page_type}}'> 
        <div class="container-fluid">
            <div class="row">
                <div id="leaflet__map-container" class="col s12 leaflet__map-container">
                    
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.footer'))
@endsection


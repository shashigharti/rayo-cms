@extends(Site::templateResolver('core::website.layouts.default'))

@inject('location_helper','Robust\RealEstate\Helpers\LocationHelper')
@inject('marketreport_helper','Robust\RealEstate\Helpers\MarketReportHelper')

@set('locations',$location_helper->getLocations(['cities','counties','zips']))
@set('settings', config('rws.market-report'))

@section('header')
    <header class="sub-header">
        <div class="container-fluid">
            <div class="site-menu">
                @include(Site::templateResolver('core::website.layouts.partials.menu'))
            </div>
        </div>
    </header>
@endsection
@section('body_section')
    <section class="market compare-locations main-content" data-page='{{$page_type}}'> 
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    <div class="compare-locations__stat">
                    <h4> Compare Selected Locations </h4>
                    <div class="compare-locations__stat-container">
                        <table class="table striped">
                            <thead>
                                <tr>
                                    <th>Locations</th>
                                    <th class="text-center">#Props Active</th>
                                    <th class="text-center">#Props Sold</th>
                                    <th class="text-center">Average Price</th>
                                    <th class="text-center">Avg. Days List-Sell</th>
                                    <th class="text-center">%Sale-to-List Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $location)
                                    <tr class="text-center">
                                        <th>{{ $location->name }}</th>
                                        <td>{{ $location->active_count }}</td>
                                        <td>{{ $location->sold_count }}</td>
                                        <td>${{ number_format($location->system_price_avg) }}</td>
                                        <td>{{ $location->days_on_mls_avg }}</td>
                                        <td>{{ $location->percent }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection


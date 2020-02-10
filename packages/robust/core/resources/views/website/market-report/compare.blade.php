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
        <div class="container report">
            <h3 class="txt-title js-bookmark_title"><span>{{settings('general-setting','company_name') ?? ''}} Real Estate Reports</span>
            </h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner--title text-center">
                        <h1>Market Reports</h1>
                        <p>Serious about real state? Size up the market like a realtor using up to date MLS data!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-center">
                        <b>Sellers -</b>
                        Research your neighborhood to list your home for the right price. &nbsp; <b>Buyers -</b>Research all neighborhoods in your price range
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row compare_selected_locations_buttons">
                <a href="#" class="btn btn-success  not-logged-in-btn " style="margin-right:10px"><span class="glyphicon glyphicon-floppy-save"></span> Save this Report</a>
                <a href="#" class="btn btn-success print-this-page" style="margin-right:10px"><span class="glyphicon glyphicon glyphicon-print"></span> Print</a>
                <a href="#" class="btn btn-success  not-logged-in-btn " style="margin-right:10px"><span class="glyphicon glyphicon-envelope"></span> Email Report to Friend</a>
                <a href="#" class="btn btn-success  not-logged-in-btn " style="margin-right:10px"><span class="glyphicon glyphicon-user"></span> Discuss with Realtor</a>
                <a href="#" title="" class="btn btn-xs btn-success pull-right  not-logged-in-btn " style="margin-right:10px">
                    Send me prop Alerts
                </a>
            </div>
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


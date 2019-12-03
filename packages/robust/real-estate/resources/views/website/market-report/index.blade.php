@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.header'))
@endsection
@section('body_section')
    <section class="market main-content" data-page='{{$page_type}}'>
    <div class="container-fluid">
        @include(Site::templateResolver('real-estate::website.market-report.partials.info'))
        @include(Site::templateResolver('real-estate::website.market-report.partials.tool-box'))
        <div id="market__search--lists" class="market__search--lists row">
            @foreach($records as $report)
                <div class="col m2">
                    <div class="market__search--lists-item card">
                        <div class="card-content">
                            <p data-id="{{$report->reportable->id}}" data-type="Title" 
                                data-value="{{$report->reportable->name}}" 
                                data-url="{{route('website.realestate.market.reports.in', [
                                    $page_type, $report->reportable->slug
                                    ])}}"
                                data-class="">
                                <input type="checkbox" value="{{$report->reportable->name}}">
                                <label><a href="#">{{$report->reportable->name}}</a></label>
                            </p>
                            <p data-type="Active" data-value="{{$report->total_listings_active}}" data-class="fa fa-bookmark">
                                <span><i class="fa fa-bookmark" aria-hidden="true"></i>Active : {{$report->total_listings_active}}</span>
                            </p>
                            <p data-type="Sold" data-value="{{$report->total_listings_sold}}" data-class="fa fa-shopping-cart">
                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Sold : {{$report->total_listings_sold}}</span>
                            </p>
                            <p data-type="Average" data-value="{{$report->average_price_sold}}" data-class="fa fa-percent">
                                <span><i class="fa fa-percent" aria-hidden="true"></i>Average : ${{$report->average_price_sold}}</span>
                            </p>
                            <p data-type="Median" data-value="{{$report->median_price_sold}}" data-class="fa fa-crosshairs">
                                <span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : ${{$report->median_price_sold}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection


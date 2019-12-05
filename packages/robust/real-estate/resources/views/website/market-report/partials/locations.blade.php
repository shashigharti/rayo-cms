<div id="market__search--lists" class="market__search--lists row">
    @foreach($records as $report)
    <div class="col m2">
        <div class="market__search--lists-item card">
            <div class="card-content">
                <p data-id="{{$report->reportable->id}}" data-type="Title" 
                                data-value="{{$report->reportable->name}}" 
                                data-url="{{route('website.realestate.market.reports.in', [
                                    $sub_location_type ?? $page_type, $report->reportable->slug
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
                    <span><i class="fa fa-percent" aria-hidden="true"></i>Average : </span>${{$report->average_price_sold}}
                </p>
                <p data-type="Median" data-value="{{$report->median_price_sold}}" data-class="fa fa-crosshairs">
                    <span><i class="fa fa-crosshairs" aria-hidden="true"></i>Median : </span>${{$report->median_price_sold}}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
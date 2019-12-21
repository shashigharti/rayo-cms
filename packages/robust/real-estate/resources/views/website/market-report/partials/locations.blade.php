@set('ranges', $marketreport_helper->generatePriceRanges())
@set('settings', config('rws.market-report.price-range'))
<div class="row">
    <div class="col m2 s12">        
        <div class="market__search--lists--side-nav">
            @foreach($ranges as $key => $value)
                <div class="market--search__lists--filter">
                    @if(isset($ranges[$key-1]))
                        <label>${{ $ranges[$key-1] }} - ${{ $value }}</label>
                    @else 
                        <label>${{ $settings['min'] }} - ${{ $value }}</label>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div id="market__search--lists" class="market__search--lists col m10 s12">
        <div class="row">
            @foreach($records as $report)
            <div class="col m2 s6">
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
                            <span><i class="material-icons">bookmark</i>Active : {{$report->total_listings_active}}</span>
                        </p>
                        <p data-type="Sold" data-value="{{$report->total_listings_sold}}" data-class="fa fa-shopping-cart">
                            <span><i class="material-icons">shopping_cart</i>Sold : {{$report->total_listings_sold}}</span>
                        </p>
                        <p data-type="Average" data-value="{{$report->average_price_sold}}" data-class="fa fa-percent">
                            <span><i>%</i>Average : </span>${{$report->average_price_sold}}
                        </p>
                        <p data-type="Median" data-value="{{$report->median_price_sold}}" data-class="fa fa-crosshairs">
                            <span><i class="material-icons">adjust</i>Median : </span>${{$report->median_price_sold}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@set('settings', settings('real-estate', 'market_report'))
@if(isset($location_name_slug))
    @set('ranges',  generate_price_ranges($marketreport_helper->getSubdivisionsMinPrice($page_type, $location_name_slug), $settings['price_max'] ?? '44500000', $settings['increment'] ?? '100000'))
@endif
<div class="row">
    @if($page_content == 'insight')
        <div class="col m2 s12">
            <div class="market__left-nav">
                @foreach($ranges as $key => $range)
                    <div class="market__price-range-item">
                        <a class="{{ $key == 0 ? 'active': '' }}"
                           href="{{ route("api.market.reports.in.subdivisions",
                                            [
                                                'location_type' => $page_type,
                                                'slug' => $location_name_slug,
                                                'price' => "{$range}"
                                            ])
                                }}"
                        >
                            {{ market_report_price_range_format($range) }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($page_content == 'insight')
        <div id="market__search--lists"
             data-page-type="{{$page_type}}"
             class="market__search--lists market--right__search col m10 s12">

        </div>
    @elseif(($page_content == 'market-report') )
        <div id="market__search--lists" data-page-type="{{$page_type}}"
             data-insight-url="{{url('market/reports/in')}}"
             class="market__search--lists market--right__search col m10 s12"
        >
            @foreach($records as $report)
                <div class=" market__search--lists-item--single">
                    <div class="market__search--lists-item card">
                        <div class="card-content">
                            <p data-id="{{ $report->location->slug }}"
                               data-type="Title"
                               data-value="{{$report->location->name}}"
                               data-url="{{route('website.realestate.market.reports.in',
                                [
                                    $sub_location_type == '' ? $page_type : $sub_location_type,
                                    $report->location->slug
                                ])}}"
                               data-class=""
                            >
                                <input type="checkbox" value="{{$report->location->name}}">
                                <label><a href="#">{{$report->location->name}}</a></label>
                            </p>
                            <p data-type="Active" data-value="{{$report->total_listings_active}}"
                               data-class="fa fa-bookmark">
                                <span><i class="material-icons">bookmark</i>Active : {{$report->total_listings_active}}</span>
                            </p>
                            <p data-type="Sold" data-value="{{$report->total_listings_sold}}"
                               data-class="fa fa-shopping-cart">
                                <span><i class="material-icons">shopping_cart</i>Sold : {{$report->total_listings_sold}}</span>
                            </p>
                            <p data-type="Average" data-value="{{$report->average_price_sold}}"
                               data-class="fa fa-percent">
                                <span><i>%</i>Average : </span>${{$report->average_price_sold}}
                            </p>
                            <p data-type="Median" data-value="{{$report->median_price_sold}}"
                               data-class="fa fa-crosshairs">
                                <span><i
                                        class="material-icons">adjust</i>Median : </span>${{$report->median_price_sold}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

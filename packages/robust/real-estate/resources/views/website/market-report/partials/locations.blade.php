@set('ranges', $marketreport_helper->generatePriceRanges())
<div class="row">
    @if($page_content == 'market-report')
        <div class="col m2 s12">        
            <div class="market__left-nav">
                @foreach($ranges as $key => $value)
                    <div class="market__price-range-item">
                        @if(isset($ranges[$key-1]))
                            <a class="{{ $marketreport_helper->isActivePriceRange($settings['price-range']['min'], $ranges[$key-1], $value)?? '' }}" 
                                href="{{ route("api.realestate.market.reports", 
                                    [
                                        'location_type' => $page_type,
                                        'price' => "{$ranges[$key-1]}-{$value}"
                                    ]) 
                                }}"
                            >
                                ${{ price_format($ranges[$key-1]) }} - ${{ price_format($value) }}
                            </a>
                        @else 
                            <a class="{{ $marketreport_helper->isActivePriceRange($settings['price-range']['min'], $settings['price-range']['min'], $value) ?? '' }}" 
                                href="{{ route("api.realestate.market.reports", 
                                    [
                                        'location_type' => $page_type,
                                        'price' => "{$settings['price-range']['min']}-{$value}"
                                    ]) 
                                }}"
                            >
                                ${{ price_format($settings['price-range']['min']) }} - ${{ price_format($value) }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    {{-- @if(($page_content == 'insight') && (count($data['records']) > 0)) --}}
    @if($page_content == 'insight')
        <div id="market__search--lists" data-page-type="{{$page_type}}" class="market__search--lists market--right__search col m10 s12">            
                @foreach($data['records'] as $report)
                    <div class="col market__search--lists-item--single">
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
    @elseif(($page_content == 'market-report') )
        <div id="market__search--lists" data-page-type="{{$page_type}}" 
            data-insight-url="{{url('market/reports/in')}}" 
            class="market__search--lists market--right__search col m10 s12"
        >
        </div>
    @endif
</div>
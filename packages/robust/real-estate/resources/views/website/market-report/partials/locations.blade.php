@set('ranges', $marketreport_helper->generatePriceRanges())
<div class="row">
    <div class="col m2 s12">        
        <div class="market__right-nav">
            @foreach($ranges as $key => $value)
                <div class="market__price-range-item">
                    @if(isset($ranges[$key-1]))
                        <a href="{{ route("api.realestate.market.reports", 
                                [
                                    'location_type' => $page_type,
                                    'price' => "{$ranges[$key-1]}-{$value}"
                                ]) 
                            }}"
                        >
                            ${{ price_format($ranges[$key-1]) }} - ${{ price_format($value) }}
                        </a>
                    @else 
                        <a href="{{ route("api.realestate.market.reports", 
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
<div id="market__search--lists" data-page-type="{{$page_type}}" class="market__search--lists col m10 s12">
        <div class="row">            
        </div>
    </div>
</div>
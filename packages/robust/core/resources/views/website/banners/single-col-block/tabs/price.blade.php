<span class="right"><i class="material-icons close">clear</i></span>
<p><label>{{ strtoupper(str_replace('_', ' ', $key)) }}</label></p>
<ul>
    @if(isset($tab['prices']))
        @set('prices', $tab['prices'])
    @else
        @set('prices', config('real-estate.frw.default_pricing_ranges'))
    @endif
    @foreach($prices as $price)
        @if($price['min'])
            <li>
                <a href="{{
                                route('website.realestate.ct.listings.banner',
                                    [
                                        'slug' => $singleColBlock->slug,
                                        'price' => "{$price['min']}-{$price['max']}",
                                        'tab' => 'tb',
                                        'tab_slug' => str_replace('_', '-', $key)
                                    ])
                            }}"
                >
                    {{ price_range_format("{$price['min']}-{$price['max']}") }}({{ $price['count'] }})
                </a>
            </li>
        @endif
    @endforeach
</ul>

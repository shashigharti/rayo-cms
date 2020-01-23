<p><label>{{ strtoupper(str_replace('_', ' ', $key)) }}</label></p>
<ul>
    @if(isset($tab['prices']))
        @foreach($tab['prices'] as $price)
            @if(isset($price['min']))
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
                        {{ price_range_format("{$price['min']}-{$price['max']}")}}({{ $price['count'] }})
                    </a>
                </li>
            @endif
        @endforeach
    @else

    @endif
</ul>

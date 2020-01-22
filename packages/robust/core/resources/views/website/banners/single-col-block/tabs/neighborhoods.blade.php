<p><label>{{ strtoupper(str_replace('_', ' ', $key)) }}</label></p>
<ul>
    @if(isset($tab['subdivisions']))

        @foreach($tab['subdivisions'] as $subdivision)
            @if(!(isset($subdivision['hide']) && $subdivision['hide']))
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
                        {{ $subdivision['slug'] }}({{ $subdivision['count'] ?? 0}})
                    </a>
                </li>
            @endif
        @endforeach
    @endif
</ul>

<span class="right"><i class="material-icons close">clear</i></span>
@if(isset($tab['subdivisions']))
    <p><label>{{ strtoupper(str_replace('_', ' ', $key)) }} ({{count($tab['subdivisions'])}})</label></p>
    <ul>
        @foreach($tab['subdivisions'] as $subdivision)
            @if(!(isset($subdivision['hide']) && $subdivision['hide']))
                <li>
                    <a href="{{
                                route('website.realestate.ct.listings.tabs.without-price',
                                    [
                                        'slug' => $singleColBlock->slug,
                                        'tab' => 'sd',
                                        'tab_slug' => str_replace('_', '-', $key),
                                        'location_slug' => $subdivision['slug']
                                    ])
                            }}"
                    >
                        {{ ucwords(str_replace('-', ' ', $subdivision['slug'])) }}({{ $subdivision['count'] ?? 0}})
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@endif

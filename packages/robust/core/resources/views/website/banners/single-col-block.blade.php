@set('image',$properties['image'] ? getMedia($properties['image'])  : '')
@if($properties)
    <div class="col m{{ $col }} s12">
        <div class="single-block">
            <img src="{{ $image }}" alt="{{ $properties['header'] }}">
            <div class="figcaption center-align">
                <h2>{{ $properties['header'] }}</h2>
                <div class="available-prices">
                    @if(isset($properties['prices']) && is_array($properties['prices']))
                        @foreach($properties['prices'] as  $key => $price)
                            <a href="{{
                                route('website.realestate.ct.listings.banner',
                                    [
                                        'slug' => $singleColBlock->slug,
                                        'price' => "{$price['min']}-{$price['max']}",
                                    ])
                                }}"
                            >
                                {{ price_range_format("{$price['min']}-{$price['max']}")}} ({{ $price['count'] }})
                            </a>
                        @endforeach
                    @endif
                </div>
                @if(isset($properties['tabs']) && is_array($properties['tabs']))
                    <div class="subdivs--list__block">
                        @foreach( $menu_helper->sort_tabs($properties['tabs']) as $key => $tabs )
                            <div class="subdivs--list__btn">
                                <i class="material-icons">redo</i>{{ strtoupper(str_replace('_', ' ', $key)) }}
                                @set('tab_fields',[])
                                <div class="subdivs--list">
                                    <p><label>{{ strtoupper(str_replace('_', ' ', $key)) }}</label></p>
                                    <ul>
                                        @if(isset($tabs['prices']))
                                            @foreach($tabs['prices'] as $price)
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
                                                            {{ price_range_format("{$price['min']}-{$price['max']}")}}
                                                            ({{ $price['count'] }})
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif


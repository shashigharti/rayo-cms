@set('image',$properties['image'] ? getMedia($properties['image'])  : '')
@if($properties)
    <div class="col m{{$col}} s12">
        <div class="single-block">
            <img src="{{$image}}" alt="{{$properties['header']}}">
            <div class="figcaption center-align">
                <h2>{{$properties['header']}}</h2>
                <div class="available-prices">
                    {{dd($properties['prices'])}}
                    {{dd('')}}
                    @if(isset($properties['prices']) && is_array($properties['prices']))
                        @foreach($properties['prices'] as  $key => $price)
                            <a  href="{{
                                route('website.realestate.ct.homes-for-sale-banner',
                                    [
                                        'slug' => $singleColBlock->slug,
                                        'price' => "{$price['min']}-{$price['max']}",
                                    ])
                                }}"
                            >
                                {{ price_range_format("{$price['min']}-{$price['max']}")}} ({{$price['count']}})
                            </a>
                        @endforeach
                    @endif
                </div>
                @if(isset($properties['tabs_data']) && is_array($properties['tabs_data']))
                    <div class="subdivs--list__block">
                        @foreach($properties['tabs_data'] as $key => $tabs)
                            <div class="subdivs--list__btn">
                                <i class="material-icons">redo</i>{{ ucwords(str_replace('_', ' ', $key)) }}
                                @set('tab_fields',[])
                                <div class="subdivs--list">
                                    <p><label>{{$key}}:</label></p>
                                    <ul>
                                        @foreach($tabs as $index => $tab)
                                            @if(isset($tab['min']))
                                                <li>
                                                <a href="{{route('website.realestate.homes-for-sale',
                                                                    [
                                                                        'location_type'=>'cities',
                                                                        'location' =>  '',
                                                                        'price' => "{$tab['min']}-{$tab['max']}",
                                                                        'sub_area' => $index
                                                                     ])
                                                          }}"
                                                >
                                                    {{ price_range_format("{$tab['min']}-{$tab['max']}")}} ({{$tab['count']}})
                                                </a>
                                            </li>
                                            @endif
                                        @endforeach
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


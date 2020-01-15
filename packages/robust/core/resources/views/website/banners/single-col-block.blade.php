@set('image',$properties['image'] ? getMedia($properties['image'])  : '')
@if($properties)
    <div class="col m{{$col}} s12">
        <div class="single-block">
            <img src="{{$image}}" alt="{{$properties['header']}}">
            <div class="figcaption center-align">
                <h2>{{$properties['header']}}</h2>
                <div class="available-prices">
                    @if(isset($properties['prices']) && is_array($properties['prices']))
                        @foreach($properties['prices'] as  $price => $count)
                            @set('property_count',$properties->property_counts->$price ?? 0)
                            <a href="{{route('website.realestate.homes-for-sale',
                                                [
                                                    'location_type' => '',
                                                    'location' => '',
                                                    'price' => $price,
                                                ]
                                                )}}"> {{$price}} ({{$count}})
                            </a>
                        @endforeach
                    @endif
                </div>
                @if(isset($properties['tabs_data']) && is_array($properties['tabs_data']))
                    <div class="subdivs--list__block">
                        @foreach($properties['tabs_data'] as $key => $tabs)
                            <div class="subdivs--list__btn">
                                <i class="material-icons">redo</i>{{ ucwords(str_replace('_', ' ', $key))}}
                                @set('tab_fields',[])
                                <div class="subdivs--list">
                                    <p><label>{{$key}}:</label></p>
                                    <ul>
                                        @foreach($tabs as $tab => $count)
                                            <li>
                                                <a href="{{route('website.realestate.homes-for-sale',
                                                                    [
                                                                        'location_type'=>'cities',
                                                                        'location' =>  '',
                                                                        'price' => $tab,
                                                                        'sub_area' => $key
                                                                     ])
                                                          }}"
                                                >
                                                    {{$tab}} ({{$count}})
                                                </a>
                                            </li>
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


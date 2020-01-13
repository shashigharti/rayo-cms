@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                @set('properties', json_decode($singleColBanner->properties,true))
                @set('location',$location_helper->getLocation($properties['locations']))
                @set('image',$listing_helper->getImageByLocation($location,$properties['image'] ?? ''))
                @if($properties && $location)
                    <div class="col m4 s12">
                        <div class="single-block">
                            <img src="{{$image}}" alt="{{$location->name}}">
                            <div class="figcaption center-align">
                                <h2>{{$location->name}}</h2>
                                <div class="available-prices">
                                    @if(isset($properties['prices']) && is_array($properties['prices']))
                                        @foreach($properties['prices'] as  $price => $count)
                                            @set('property_count',$properties->property_counts->$price ?? 0)
                                            <a href="{{route('website.realestate.homes-for-sale',
                                                [
                                                    'location_type' => get_location_route_by_type($location->locationable_type),
                                                    'location' => $location->slug,
                                                    'price' => $price,
                                                ]
                                                )}}"> {{$price}} ({{$count}})</a>
                                        @endforeach
                                    @endif
                                </div>
                                @if(isset($properties['tabs_data']) && is_array($properties['tabs']))
                                    <div class="subdivs--list__block">
                                        @foreach($properties['tabs_data'] as $key => $tabs)
                                            <div class="subdivs--list__btn">
                                                <i class="material-icons">redo</i>
                                                <span class="subdivs--list__text">See</span> {{$key}}
                                                @set('tab_fields',[])
                                                <div class="subdivs--list">
                                                    <p><label>{{$key}}:</label></p>
                                                    <ul>
                                                       @foreach($tabs as $tab => $count)
                                                            <li><a href="{{route('website.realestate.homes-for-sale',
                                                                    [
                                                                        'location_type'=>'cities',
                                                                        'location' =>  $location->slug,
                                                                        'price' => $tab,
                                                                        'sub_area' => $key
                                                                     ]
                                                                     )}}">
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
            @endforeach
        </div>
    </div>
</section>


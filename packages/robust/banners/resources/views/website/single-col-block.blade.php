@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                @set('properties', json_decode($singleColBanner->properties))
                @set('image',$listing_helper->getImageByCity($properties->location,$properties->image))
                @if($properties)
                    @set('location',$location_helper->byId($properties->location))
                    <div class="col m4 s12">              
                        <div class="single-block">
                            <img src="{{$image}}" alt="{{$location->name}}">
                            <div class="figcaption center-align">
                                <h2>{{$location->name}}</h2>
                                <div class="available-prices">
                                    @if(isset($properties->prices) && is_array($properties->prices))
                                        @foreach($properties->prices as  $price)
                                            @set('property_count',$properties->property_counts->$price ?? 0)
                                            <a href="{{route('website.realestate.homes-for-sale',[
                                                'location_type' => 'cities',
                                                'location' => $location->slug,
                                                'price' => $price
                                                ])}}"> {{$price}} ({{$property_count}})</a>
                                        @endforeach
                                    @endif
                                </div>
                                @if($properties->sub_areas && is_array($properties->sub_areas))
                                    <div class="subdivs--list__block">
                                        @foreach($properties->sub_areas as $sub_area)
                                            <div class="subdivs--list__btn">
                                                <i class="material-icons">redo</i>
                                                <span class="subdivs--list__text">See</span> {{$sub_area}}
                                                @set('tab_fields',$properties->tabs->$sub_area ?? [])
                                                <div class="subdivs--list">
                                                    <p><label>{{$sub_area}}:</label></p>
                                                    <ul>
                                                       @foreach($tab_fields as $key => $count)
                                                            <li><a href="{{route('website.realestate.homes-for-sale.sub_area',[
                                                                    'location_type'=>'cities',
                                                                    'location' =>  $location->slug,
                                                                    'price' => $key,
                                                                    'sub_area' => $sub_area
                                                                     ])}}">
                                                                    {{$key}} ({{$count}})
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


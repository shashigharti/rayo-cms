@set('sliders', $banner_helper->getBannersByType(['slider']))
@if(!empty($sliders))
    @foreach($sliders as $slider)
        @set('properties', json_decode($slider->properties))
        @set('location', $location_helper->getLocation($properties->locations[0] ?? ''))
        <section class="advertisement">
            <div class="container-fluid">
                <div class="row">
                    <div class="col s8">
                        <h4 class="sub-title">Homes For Sale in {{$location->name ?? ''}}</h4>
                    </div>
                    <div class="col s4 right-align">
                        <a href="{{route('website.realestate.homes-for-sale',[
                            'location_type' => 'cities',
                            'location' => $location->slug ?? ''
                            ])}}" class="view-all">View All</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="adv-slider2 owl-carousel owl-theme" id="adv--slider">
                            @set('properties_count', ($properties->property_count > 5)?$properties->property_count: 5)
                            @set('listings',$listing_helper->getListingsByType($location->locationable_type, $location->id, $properties_count))
                            @foreach($listings as $listing)
                                @set('first_image', $listing->images()->first())
                                <a href="{{route('website.realestate.single',['slug' => $listing->slug])}}">
                                    <div class="single-block item">
                                        <img src={{$first_image->url ?? ''}} alt="{{$listing->name ?? ''}}">
                                        <div class="slider--text">
                                            <h4>${{$listing->system_price}}</h4>
                                            <p>{{$listing->name ?? ''}}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif


@set('sliders', $banner_helper->getBannersByType(['slider']))
@if(!empty($sliders))
    @foreach($sliders as $slider)
        @set('properties', json_decode($slider->properties))
        <section class="advertisement">
            <div class="container-fluid">
                <div class="row">
                    <div class="col s8">
                        <h4 class="sub-title">Homes For Sale in {{$properties->location ? $location_helper->getName($properties->location_type,$properties->location) :  ''}}</h4>
                    </div>
                    <div class="col s4 right-align">
                        <a href="{{route('website.realestate.city',['city'=>$properties->location])}}" class="view-all">View All</a>
                    </div>
                </div>
                <div class="adv-slider2 owl-carousel owl-theme" id="adv--slider">
                    @set('properties_count', ($properties->property_count > 5)?$properties->property_count: 5)
                    @set('properties_type', (isset($properties->location_type) && $properties->location_type != '')?$properties->location_type: 'city_id')
                    @set('location_name', $properties->location)
                    @set('listings',$listing_helper->getListingsByType($properties_type, $location_name, $properties_count))
                    @foreach($listings as $listing)
                        @set('first_image', $listing->images()->first())
                        <a href="{{route('website.realestate.single',['id' => $listing->id,'name' => $listing->slug])}}">
                            <div class="single-block item">
                                <img src={{$first_image->url ?? ''}}>
                                <div class="slider--text">
                                    <h4>${{$listing->system_price}}</h4>
                                    <p>{{$listing->name ?? ''}}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
@endif


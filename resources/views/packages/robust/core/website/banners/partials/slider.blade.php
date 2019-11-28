@set('sliders', $banner_helper->getBannersByType(['slider']))
@inject('listing_helper','Robust\RealEstate\Helpers\ListingHelper')
@if(!empty($sliders))
    @foreach($sliders as $slider)
        @set('properties', json_decode($slider->properties))
        <section class="advertisement">
            <div class="container-fluid">
                <div class="row">
                    <div class="col s8">
                        <h4 class="sub-title">Homes For Sale in {{$properties->sub_areas ?? ''}}</h4>
                    </div>
                    <div class="col s4 right-align">
                        <a href="#" class="view-all">View All</a>
                    </div>
                </div>
                <div class="adv-slider2 owl-carousel owl-theme" id="adv--slider">
                    @if(isset($properties->property_count) && isset($properties->area_types) && isset($properties->property_count))
                        @set('listings',$listing_helper->getListingsByType($properties->area_types,$properties->sub_areas,$properties->property_count))
                        @foreach($listings as $listing)
                            <a href="{{route('website.realestate.single',['id' => $listing->id,'name' => $listing->listing_slug])}}">
                                <div class="single-block item">
                                    <img src={{$listing->image->listing_url ?? ''}}>
                                    <div class="slider--text">
                                        <h4>${{$listing->system_price}}</h4>
                                        <p>{{$listing->listing_name ?? ''}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endforeach
@endif

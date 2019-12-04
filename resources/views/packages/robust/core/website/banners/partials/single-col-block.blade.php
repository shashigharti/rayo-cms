@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                @set('properties', json_decode($singleColBanner->properties))
                @set('image',$listing_helper->getImageByCity($properties->location,$properties->image))
                @if($properties)
                    <div class="col s4">
                        <div class="single-block">
                            <img src="{{$image}}" alt="">
                            <div class="figcaption center-align">
                                <h2>{{$properties->location ?? ''}}</h2>
                                <div class="available-prices">
                                    @if(isset($properties->prices) && is_array($properties->prices))
                                        @foreach($properties->prices as  $price)
                                            @set('property_count',$properties->property_counts->$price ?? 0)
                                            <a href="{{route('website.realestate.city.price',['city' => $properties->location,'price' => $price])}}">{{$price}} ({{$property_count}})</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>


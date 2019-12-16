@set('TwoColAds', $banner_helper->getBannersByType(['two-col-ad']))
@foreach($TwoColAds as $key => $TwoColAd)
    @set('properties', json_decode($TwoColAd->properties))
    @if($properties)
        @set('image',$listing_helper->getImageByCity($properties->location,$properties->image))
        @set('url',!in_array($properties->button_url,['','#']) ? $properties->button_url : route('website.realestate.homes-for-sale', ['location_type' => 'city', 'location' => $properties->location]))
        <section class="adv--block">
            <div class="container-fluid">
                <div class="row">
                    @if($key%2)
                        <div class="col s7">
                            <img src="{{$image}}">
                        </div>
                        <div class="col s5">
                            <h4>{{$properties->header ?? ''}}</h4>
                            <p>{{$properties->content ?? ''}}</p>
                            <p><i>City : {{$properties->location ?? ''}}</i></p>
                            <a href="{{$url}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
                        </div>
                     @else
                        <div class="col s5">
                            <h4>{{$properties->header ?? ''}}</h4>
                            <p>{{$properties->content ?? ''}}</p>
                            <p><i>City : {{$properties->location ?? ''}}</i></p>
                            <a href="{{$url}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
                        </div>
                        <div class="col s7">
                            <img src="{{$image}}">
                        </div>
                      @endif
                </div>
            </div>
        </section>
    @endif
@endforeach

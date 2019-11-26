@set('TwoColAds', $banner_helper->getBannersByType(['two-col-ad']))
@foreach($TwoColAds as $key => $TwoColAd)
    @set('properties', json_decode($TwoColAd->properties))
    @if($properties)
        <section class="adv--block">
            <div class="container-fluid">
                <div class="row">
                    @if($key%2)
                        <div class="col s7">
                            <img src="{{$properties->image ? getMedia($properties->image) : ''}}">
                        </div>
                        <div class="col s5">
                            <h4>{{$properties->header ?? ''}}</h4>
                            <p>{{$properties->content ?? ''}}</p>
                            <a href="{{$properties->button_url ?? '#'}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
                        </div>
                     @else
                        <div class="col s5">
                            <h4>{{$properties->header ?? ''}}</h4>
                            <p>{{$properties->content ?? ''}}</p>
                            <a href="{{$properties->button_url ?? '#'}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
                        </div>
                        <div class="col s7">
                            <img src="{{$properties->image ? getMedia($properties->image) : ''}}">
                        </div>
                      @endif
                </div>
            </div>
        </section>
    @endif
@endforeach

@set('TwoColAds', $banner_helper->getBannersByType(['two-col-ad']))
<section class="adv--block">
    <div class="container-fluid">
        @foreach($TwoColAds as $TwoColAd)
            @set('properties', json_decode($TwoColAd->properties))
            @if($properties)
                <div class="row">
                    <div class="col s7">
                        <img src="{{$properties->image ? getMedia($properties->image) : ''}}">
                    </div>
                    <div class="col s5">
                        <h4>{{$properties->header ?? ''}}</h4>
                        <p>{{$properties->content ?? ''}}</p>
                        <a href="{{$properties->button_url ?? '#'}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>

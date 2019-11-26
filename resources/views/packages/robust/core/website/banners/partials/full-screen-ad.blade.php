@set('fullScreenSlider', $banner_helper->getBannersByType(['full-screen-ad']))

@foreach($fullScreenSlider as $slider)
    @set('properties', json_decode($slider->properties))
    @if($properties)
        <section class="adv--single">
            <img src="{{$properties->image ? getMedia($properties->image) : ''}}" alt="">
            <div class="adv-single-text">
                <p>{{$properties->content ?? ''}}</p>
                <a href="{{$properties->button_url ?? '#'}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
            </div>
        </section>
    @endif
@endforeach

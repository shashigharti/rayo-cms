@set('fullScreenSlider', $banner_helper->getBannersByType(['full-screen-ad']))

@foreach($fullScreenSlider as $slider)
    @set('properties', json_decode($slider->properties))
    <section class="adv--single">
        <div class="adv-single-text">
            <p>{{$properties->content ?? ''}}</p>
            <a href="{{$properties->button_url ?? '#'}}" class="buy-now-btn">{{$proerties->button_text ?? 'Buy Now'}}</a>
        </div>
    </section>
@endforeach

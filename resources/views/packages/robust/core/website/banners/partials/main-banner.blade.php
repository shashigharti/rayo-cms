@set('mainBannerSliders', $banner_helper->getBannersByType(['main-banner']))

<ul class="slides">
    @foreach($mainBannerSliders as $mainBannerSlider)
        @set('properties', json_decode($mainBannerSlider->properties))
        <li>
            <img src="{{$properties->image ?? getMedia($properties->image)}}" alt="">
        </li>
    @endforeach
</ul>

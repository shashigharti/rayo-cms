@set('mainBannerSliders', $banners->getBannersInType(
    ['main-banner'])

<ul class="slides">
    @foreach($mainBannerSliders as $mainBannerSlider)
        <li>
            <img src="{{getMedia($mainBannerSlider->properties->image)}}" alt="{{$mainBannerSlider->name}}">
        </li>
    @endforeach
</ul>
@set('mainBannerSliders', $banner_helper->getBannersByType(['main-banner']))
<!-- {{--main--banner_slider--}}
<div class="slides owl-carousel owl-theme" id="banner--slider">
    @foreach($mainBannerSliders as $mainBannerSlider)
        @set('properties', json_decode($mainBannerSlider->properties))
        @if($properties)
            <div class="item">
            	<img src="{{$properties->image ? getMedia($properties->image) : "/images/banners/banner.jpg"}}" alt="">
            </div>
        @endif
    @endforeach
</div> -->
<div class="slides owl-carousel owl-theme" id="banner--slider">
	<div class="item">
		<img src="assets/website/images/banner.jpg">
	</div>
	<div class="item">
		<img src="assets/website/images/banner2.jpg">
	</div>
	<div class="item">
		<img src="assets/website/images/banner3.jpg">
	</div>
</div>
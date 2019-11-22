@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                @set('properties', json_decode($singleColBanner->properties))
                <div class="col s4">
                    <div class="single-block">
                        <img src="{{$properties->image ?? getMedia($properties->image)}}" alt="">
                        <div class="figcaption center-align">
                            <h2>{{$singleColBanner->name}}</h2>
                            <div class="available-prices">
                                @if(isset($properties->prices))
                                    @foreach($properties->prices as $price)
                                        <a href="#">{{$price}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



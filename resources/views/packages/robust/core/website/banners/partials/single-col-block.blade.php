@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block'])

<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                <div class="col s4">
                    <div class="single-block">
                        <img src="assets/website/images/block.jpg">
                        <div class="figcaption center-align">
                            <h2>HONOLULU</h2>
                            <div class="available-prices">
                                <a href="#">$20,000-$40,000 (10)</a>
                                <a href="#">$20,000-$40,000 (10)</a>
                                <a href="#">$20,000-$40,000 (10)</a>
                                <a href="#">$20,000-$40,000 (10)</a>
                                <a href="#">$20,000-$40,000 (10)</a>
                                <a href="#">$20,000-$40,000 (10)</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </div>
</section>
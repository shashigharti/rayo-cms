@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                @include(Site::templateResolver("core::website.banners.single-col-block", ['properties' => $singleColBanner->properties]))
            @endforeach
        </div>
    </div>
</section>


@set('adBanners', $banner_helper->getBannersNotInType(['banner-slider','single-col-block','slider','two-col-ad']))
@include(Site::templateResolver("core::website.banners.two-col-ad"))
@include(Site::templateResolver("core::website.banners.slider"))
@foreach($adBanners as $adBanner)
    @include(Site::templateResolver("core::website.banners.{$adBanner->template}"))
@endforeach

@set('singleColBanners', $banner_helper->getBannersByType(['single-col-block']))
<section class="search-lists">
    <div class="container-fluid">
        <div class="row">
            @foreach($singleColBanners as $singleColBanner)
                @set('properties',json_decode($singleColBanner->properties,true))
                @if(isset($properties['property_type']) && count($properties['property_type']) > 0)
                    @include(Site::templateResolver("core::website.banners.single-col-block-with-type", ['properties' => $singleColBanner->properties]))

                @else
                    @include(Site::templateResolver("core::website.banners.single-col-block", ['properties' => $singleColBanner->properties]))
                @endif
            @endforeach
        </div>
    </div>
</section>
@include(Site::templateResolver("core::website.banners.two-col-ad"))
@include(Site::templateResolver("core::website.banners.slider"))

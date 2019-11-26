@set('adBanners', $banner_helper->getBannersNotInType(['banner-slider','single-col-block','slider','two-col-ad']))

@include(Site::templateResolver("core::website.banners.partials.single-col-block"))
@include(Site::templateResolver("core::website.banners.partials.two-col-ad"))

@include(Site::templateResolver("core::website.banners.partials.slider"))
@foreach($adBanners as $adBanner)
    @include(Site::templateResolver("core::website.banners.partials.{$adBanner->template}"))
@endforeach

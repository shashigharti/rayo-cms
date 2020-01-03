@set('adBanners', $banner_helper->getBannersNotInType(['banner-slider','single-col-block','slider','two-col-ad']))

@include(Site::templateResolver("core::website.banners.single-col-block"))
@include(Site::templateResolver("core::website.banners.two-col-ad"))
@include(Site::templateResolver("core::website.banners.slider"))
@foreach($adBanners as $adBanner)
    @include(Site::templateResolver("core::website.banners.{$adBanner->template}"))
@endforeach

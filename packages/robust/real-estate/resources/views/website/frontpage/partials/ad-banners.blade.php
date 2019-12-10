@set('adBanners', $banner_helper->getBannersNotInType(['banner-slider','single-col-block','slider','two-col-ad']))

@include(Site::templateResolver("banners::website.single-col-block"))
@include(Site::templateResolver("banners::website.two-col-ad"))
@include(Site::templateResolver("banners::website.slider"))
@foreach($adBanners as $adBanner)
    @include(Site::templateResolver("banners::website..{$adBanner->template}"))
@endforeach

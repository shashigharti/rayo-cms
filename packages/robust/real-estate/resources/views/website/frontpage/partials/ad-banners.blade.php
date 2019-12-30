@set('adBanners', $banner_helper->getBannersNotInType(['banner-slider','single-col-block','slider','two-col-ad']))

@include(Site::templateResolver("real-estate::website.banners.single-col-block"))
@include(Site::templateResolver("real-estate::website.banners.two-col-ad"))
@include(Site::templateResolver("real-estate::website.banners.slider"))
@foreach($adBanners as $adBanner)
    @include(Site::templateResolver("real-estate::website.banners.{$adBanner->template}"))
@endforeach

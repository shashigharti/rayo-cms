@set('adBanners', $banners->getBannersNotInType(
    ['banner-slider','single-col-block'])


@foreach($adBanners as $adBanner)

@endforeach
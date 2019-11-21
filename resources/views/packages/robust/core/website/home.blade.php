@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@set('banners', $banner_helper->getBanners())
@section('content')
    @include(Site::templateResolver('core::website.frontpage.header'))
    @include(Site::templateResolver('core::website.frontpage.single-col-properties'))
    @include(Site::templateResolver('core::website.frontpage.ad-banners'))
    @include(Site::templateResolver('core::website.frontpage.cta'))
    @include(Site::templateResolver('core::website.frontpage.footer'))
@endsection



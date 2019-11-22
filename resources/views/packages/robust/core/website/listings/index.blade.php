@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.listings.partials..header'))
@endsection

@section('body_section')
    @include(Site::templateResolver('core::website.listings.partials.main'))
@endsection

@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection

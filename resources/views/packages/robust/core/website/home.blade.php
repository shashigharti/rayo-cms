@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','App\Helpers\BannerHelper')
@section('content')
    @include(Site::templateResolver('core::website.partials.header'))
    @include(Site::templateResolver('core::website.partials.properties'))
    @include(Site::templateResolver('core::website.partials.ad-banners'))
    @include(Site::templateResolver('core::website.partials.cta'))
    @include(Site::templateResolver('core::website.partials.footer'))
@endsection



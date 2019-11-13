@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','App\Helpers\BannerHelper')
@section('content')
    @include(Site::templateResolver('core::website.partials.common.header'))
    @include(Site::templateResolver('core::website.partials.properties'))
    {{-- @include(Site::templateResolver('core::website.partials.common.advertisement')) --}}
    @include(Site::templateResolver('core::website.partials.common.cta'))
    @include(Site::templateResolver('core::website.partials.common.footer'))
@endsection



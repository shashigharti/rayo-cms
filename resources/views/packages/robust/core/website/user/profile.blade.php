@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','App\Helpers\BannerHelper')
@section('content')
    @include(Site::templateResolver('core::website.partials.common.header'))
    @include(Site::templateResolver('core::website.user.partials.favourites'))
    @include(Site::templateResolver('core::website.user.partials.reports'))
    @include(Site::templateResolver('core::website.user.partials.bookmarks'))
    @include(Site::templateResolver('core::website.user.partials.searches'))
    @include(Site::templateResolver('core::website.user.partials.info'))
    @include(Site::templateResolver('core::website.partials.common.footer'))
@endsection


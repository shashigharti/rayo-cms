@extends(Site::templateResolver('core::website.layouts.default'))
@section('content')
    @include(Site::templateResolver('core::website.partials.common.header'))
    @include(Site::templateResolver('core::website.partials.properties'))
    @include(Site::templateResolver('core::website.partials.common.cta'))
    @include(Site::templateResolver('core::website.partials.common.about-us'))
    @include(Site::templateResolver('core::website.partials.common.footer'))
@endsection



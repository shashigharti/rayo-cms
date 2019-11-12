@extends(Site::templateResolver('core::website.layouts.default'))
@section('content')
    @include(Site::templateResolver('core::website.listings.partials.header'))
    @include(Site::templateResolver('core::website.listings.partials.main'))
    @include(Site::templateResolver('core::website.listings.partials.footer'))
@endsection

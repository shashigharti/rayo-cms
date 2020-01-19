@extends(Site::templateResolver('core::website.layouts.default'))
@section('header')
    @include(Site::templateResolver('core::website.layouts.partials.header'))
@endsection
@section('body_section')
    @include(Site::templateResolver('core::website.listings.partials.main'))
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.layouts.partials.footer'))
@endsection


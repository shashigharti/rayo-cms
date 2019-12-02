@extends(Site::templateResolver('core::website.layouts.default'))
@section('header')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.header'))
@endsection

@section('body_section')
    @include(Site::templateResolver('real-estate::website.listings.partials.main'))
@endsection

@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection
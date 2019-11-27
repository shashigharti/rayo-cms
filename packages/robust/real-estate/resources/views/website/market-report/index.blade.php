@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('real-estate::website.frontpage.partials.header'))
@endsection
@section('body_section')
    <section class="market main-content" data-page='{{$page_type}}'>
    <div class="container-fluid">
        @include(Site::templateResolver('real-estate::website.market-report.partials.info'))
        @include(Site::templateResolver('real-estate::website.market-report.partials.tool-box'))
        @include(Site::templateResolver('real-estate::website.market-report.partials.locations'))        
    </div>
</section>
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection


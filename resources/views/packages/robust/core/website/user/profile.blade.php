@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.listings.partials.header'))
@endsection
@section('body_section')
    <section class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    @include(Site::templateResolver('core::website.user.partials.favourites'))
                    @include(Site::templateResolver('core::website.user.partials.reports'))
                    @include(Site::templateResolver('core::website.user.partials.bookmarks'))
                    @include(Site::templateResolver('core::website.user.partials.searches'))
                    @include(Site::templateResolver('core::website.user.partials.info'))
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    @include(Site::templateResolver('core::website.listings.partials.footer'))
@endsection

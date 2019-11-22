@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.frontpage.partials.menu'))   
@endsection
@section('body_section')    
    <section class="row">
        <div class="col m3">
            @include(Site::templateResolver('core::website.user.partials.side-nav'))
        </div>
        <div class="col m8">
            <div class="card">
                <div id="profile" class="col s12">
                    @include(Site::templateResolver('core::website.user.partials.info'))
                </div>
                <div id="favourites" class="col s12">
                    @include(Site::templateResolver('core::website.user.partials.favourites'))
                </div>
                <div id="reports" class="col s12">
                    @include(Site::templateResolver('core::website.user.partials.reports'))
                </div>
                <div id="bookmarks" class="col s12">
                    @include(Site::templateResolver('core::website.user.partials.bookmarks'))
                </div>
                <div id="searches" class="col s12">
                    @include(Site::templateResolver('core::website.user.partials.searches'))
                </div>                
            </div>
        </div>    
    </section>    
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection
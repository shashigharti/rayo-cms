@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.listings.partials.header'))
@endsection
@section('body_section')  
    <section class="main-content">
        <div class="container-fluid">
            <div class="row">  
                <div class="col s2 side-tab">
                    @include(Site::templateResolver('core::website.user.partials.side-nav'))
                </div>
                <div class="col s10">
                    <div class="side-tab-content col s12">
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
            </div>
        </div>   
    </section>    
@endsection
@section('footer')
    @include(Site::templateResolver('core::website.frontpage.partials.footer'))
@endsection
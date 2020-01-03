@set('locations', $location_helper->getLocations(['cities','counties','zips']))
<header class="sub-header">
    <div class="container-fluid">
        <div class="site-menu">
            @include(Site::templateResolver('core::website.layouts.partials.menu'))
            @include(Site::templateResolver('core::website.layouts.partials.mobile-menu'))
        </div>
    </div>
</header>